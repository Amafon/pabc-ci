<?php

namespace admin\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;
use App\Entities\Article;
use App\Entities\Category;
use RuntimeException;
use finfo;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController
{
    private ArticlesModel $model;
    private CategoriesModel $catModel;
    private UserModel $userModel;

    public function __construct()
    {
        $this->model        = new ArticlesModel();
        $this->catModel     = new CategoriesModel();
        $this->userModel    = new UserModel();
    }

    private function getArticleOr404($id)
    {
        $article = $this->model->find($id);

        if ($article === null) {
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
            'articles' => $articles,
            // 'pager'=>$this->model->pager
        ];
        return view('admin\Views\Articles\index.php', $data);
    }

    public function new()
    {

        $categories =     $this->catModel->findAll();

        $data = [
            'categories' => $categories,
        ];

        return view('admin\Views\Articles\new.php', $data);
    }

    public function create()
    {

        $article = new Article($this->request->getPost());

        $file = $this->request->getFile('image');

        $article->user_id = auth()->user()->id;

        // Vérifier que le fichier envoyé est valide
        if (!$file->isValid()) {
            $error_code = $file->getError();

            if ($error_code === UPLOAD_ERR_NO_FILE) {
                return redirect()->back()
                    ->with('errors', ['Pas de fichier sélectionné'])
                    ->withInput();
            }

            throw new RuntimeException($file->getErrorString() . ' ' . $error_code);
        }

        // Vérifier que la taille du fichier joint ne dépasse pas 2 Mo
        if ($file->getSizeByUnit('mb') > 10) {
            return redirect()->back()
                ->with('errors', ['Taille du fichier trop grande'])
                ->withInput();
        }

        // Vérifier que le type du fichier soit png ou jpeg ou webp
        if (!in_array($file->getMimeType(), ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/avif'])) {
            return redirect()->back()
                ->with('errors', ['Format du fichier incorrect'])
                ->withInput();
        }

        // Move the upload file to a permanent location
        $path = $file->move(FCPATH . "article_images\\");

        $path = FCPATH . "article_images\\" . $file->getName();

        service('image')->withFile($path)
            ->fit(1500, 800, 'center')
            ->save($path);

        // Save the Name of the Uploaded File to the Article Record
        $article->image = $file->getName();

        $id = $this->model->insert($article);

        if ($id === false) {
            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->withInput();
        }

        return redirect()->to('admin/services/com/site/articles/new')
            ->with('message', 'L\'article ' . $id . ' a été crée avec succès.');
    }

    public function show($id)
    {
        $article =      $this->getArticleOr404($id);

        $category =     $this->catModel->where('id', $article->category_id)->first();

        $user =         $this->userModel->where('id', $article->user_id)->first();

        $data = [
            'article'       => $article,
            'category'      => $category,
            'user'          => $user,
        ];

        return view('Articles/show.php', $data);
    }

    public function edit($id)
    {

        $article = $this->getArticleOr404($id);

        $categories =     $this->catModel->findAll();

        $data = [
            'article' => $article,
            'categories' => $categories,
        ];

        return view('admin\Views\Articles\edit.php', $data);
    }

    public function update($id)
    {
        $article = $this->getArticleOr404($id);

        $article->fill($this->request->getPost());

        $file = $this->request->getFile('image');

        // Vérifier que le fichier envoyé est valide
        if (!$file->isValid()) {
            $error_code = $file->getError();

            if ($error_code === UPLOAD_ERR_NO_FILE) {
                return redirect()->back()
                    ->with('errors', ['Pas de fichier sélectionné'])
                    ->withInput();
            }

            throw new RuntimeException($file->getErrorString() . ' ' . $error_code);
        }

        // Vérifier que la taille du fichier joint ne dépasse pas 2 Mo
        if ($file->getSizeByUnit('mb') > 10) {
            return redirect()->back()
                ->with('errors', ['Taille du fichier trop grande'])
                ->withInput();
        }

        // Vérifier que le type du fichier soit png ou jpeg ou webp
        if (!in_array($file->getMimeType(), ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/avif'])) {
            return redirect()->back()
                ->with('errors', ['Format du fichier incorrect'])
                ->withInput();
        }

        // Move the upload file to a permanent location
        $path = $file->move(FCPATH . "article_images\\");

        $path = FCPATH . "article_images\\" . $file->getName();

        service('image')->withFile($path)
            ->fit(1500, 800, 'center')
            ->save($path);


        if ($article->image === $file->getName()) {

            return redirect()->back()
                ->with('message', 'Nothing to update');
        }

        // Save the Name of the Uploaded File to the Article Record
        $article->image = $file->getName();

        if (!$article->hasChanged()) {

            return redirect()->back()
                ->with('message', 'Nothing to update');
        }

        if ($this->model->save($article)) {

            return redirect()->to("articles/$id/show")
                ->with('message', 'Article Updated');
        }

        return redirect()
            ->back()
            ->with('errors', $this->model->errors())
            ->withInput();
    }

    public function confirmDelete($id)
    {
        $article = $this->getArticleOr404($id);

        $data = [
            'article' => $article,
        ];

        return view('\admin\Views\Articles\confirmDelete.php', $data);
    }

    public function delete($id)
    {
        $result = $this->model->delete($id);

        if (!$result) {

            return redirect()->back()
                ->with('errors', ["L'article $id n'a pas été supprimé."]);
        }

        return redirect()->to('admin/services/com/site/articles');
    }
}
