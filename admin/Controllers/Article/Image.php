<?php

namespace admin\Controllers\Article;

use App\Controllers\BaseController;
use App\Models\ArticlesModel;
use App\Entities\Article;
use CodeIgniter\Exceptions\PageNotFoundException;
use finfo;
use RuntimeException;

class Image extends BaseController
{
    private ArticlesModel $model;

    public function __construct()
    {
        $this->model = new ArticlesModel();
    }

    private function getArticleOr404($id)
    {
        $article = $this->model->find($id);
        if($article === null)
        {
            throw new PageNotFoundException('L\'id ' . $id . ' n\'existe pas.');
        }
        return $article;
    }

    public function new($id)
    {
        $article = $this->getArticleOr404($id);

        return view('\admin\Views\Article\Image\new.php', ['article'=>$article]);
    }

    public function create($id)
    {
        $article = $this->getArticleOr404($id);

        $file = $this->request->getFile('image');

        // dd($file);   

        // Vérifier que le fichier envoyé est valide
        if(! $file->isValid())
        {
            $error_code = $file->getError();

            if($error_code === UPLOAD_ERR_NO_FILE)
            {
                return redirect()->back()
                                 ->with('errors', ['Pas de fichier sélectionné'])
                                 ->withInput();;
            }

            throw new RuntimeException($file->getErrorString() . ' ' . $error_code);
        }

        // Vérifier que la taille du fichier joint ne dépasse pas 2 Mo
        if($file->getSizeByUnit('mb') > 3)
        {
            return redirect()->back()
                             ->with('errors', ['Taille du fichier trop grande'])
                             ->withInput();;
        }

        // Vérifier que le type du fichier soit png ou jpeg ou webp
        if(! in_array($file->getMimeType(), ['image/png', 'image/jpeg', 'image/jpg', 'image/webp']))
        {
            return redirect()->back()
                             ->with('errors', ['Format du fichier incorrect'])
                             ->withInput();;
        }

        // Move the upload file to a permanent location
        $path = $file->store('article_images');

        $path = WRITEPATH . 'uploads/' . $path;
        service('image')->withFile($path)
                        ->fit(1500, 800, 'center')
                        ->save($path);

        // Save the Name of the Uploaded File to the Article Record
        $article->image = $file->getName();

        $this->model->protect(false)
                    ->save($article);

        // return redirect()->to('articles/' . $id)
        //                  ->with('message', 'Image Uplaod');

        
    }

    public function get($id)
    {
        $article = $this->getArticleOr404($id);
        
        if($article->image)
        {
            $path = WRITEPATH . "uploads/article_images/" . $article->image;

            $finfo = new finfo(FILEINFO_MIME);

            $type = $finfo->file($path);

            header("Content-Type: $type");
            header("Content-Length: " . filesize($path));

            readfile($path);

            exit;
        }
    }
}
