<?php

namespace admin\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Entities\Article;
use App\Entities\Category;
use RuntimeException;
use finfo;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController
{
    private ArticlesModel $model;
    private CategoriesModel $catModel;

    public function __construct()
    {
        $this->model = new ArticlesModel();
        $this->catModel = new CategoriesModel();
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

    public function menu()
    {
        return view('admin\Views\Articles\menu.php');
    }

    public function index()
    {
        $articles = $this->model->select('articles.*, users.first_name, categories.label')
                                ->join('users', 'users.id = articles.user_id')
                                ->join('categories', 'categories.id = articles.category_id')
                                ->orderBy('created_at')
                                ->findAll();

        $data = [
            'articles'=>$articles,
            // 'pager'=>$this->model->pager
        ];
        return view('admin\Views\Articles\index.php', $data);
    }

    public function new()
    {
        return view('admin\Views\Articles\new.php');
    }

    public function create()
    {
        $article = new Article($this->request->getPost());

        $article->user_id = auth()->user()->id;
        
        $file = $this->request->getFile('image');

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
        if(! $file->getSizeByUnit('mb') > 2)
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

        // $this->model->protect(false)
        //             ->save($article);

        // return redirect()->to('articles/' . $id)
        //                  ->with('message', 'Image Uplaod');

        
        
        $id = $this->model->insert($article);

        if($id===false)
        {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->withInput();
        }

        return redirect()->to('admin/services/com/site/articles/new')
                         ->with('message', 'L\'article ' . $id . ' a été crée avec succès.');
    }

    public function edit($id)
    {
        $categories = $this->catModel->findAll();
        $article = $this->getArticleOr404($id);

        $data = [
            'article'=>$article,
            'categories'=>$categories
        ];

        return view('admin\Views\Articles\edit.php', $data);
    }

    public function getArticleImage($id)
    {
        $article = $this->model->getArticleOr404($id);
        
        if($article->image)
        {
            $path = WRITEPATH . "uploads/article_images" . $article->image;

            $finfo = new finfo(FILEINFO_MIME);

            $type = $finfo->file($path);

            header("Content-Type: $type");
            header("Content-Length: " . filesize($path));

            readfile($path);
            
            exit;
        }
    }
}
