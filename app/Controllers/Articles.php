<?php

namespace App\Controllers;

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

    public function index()
    {
        $param = $this->request->getGet();
        if ($param) {
            $articles = $this->model->select('articles.*, categories.label, users.first_name')
                ->join('categories', 'categories.id = articles.category_id')
                ->join('users', 'users.id = articles.user_id')
                ->where('category_id', $param['category'])
                ->findAll();
        } else {
            $articles = $this->model->select('articles.*, categories.label, users.first_name')
                ->join('categories', 'categories.id = articles.category_id')
                ->join('users', 'users.id = articles.user_id')
                ->findAll();
        }

        $categories = $this->catModel->findAll();

        foreach ($categories as $category) {
            $nb = count($this->model->where('category_id', $category->id)->findAll());
            $category->nb = $nb;
        }

        $data = [
            'articles'  => $articles,
            'categories' => $categories,
        ];

        return view('Articles/index.php', $data);
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

    public function getImage($id)
    {
        $article = $this->getArticleOr404($id);
        if ($article->image) {
            $path = WRITEPATH . 'uploads/article_images/' . $article->image;
            $finfo = new finfo(FILEINFO_MIME);
            $type = $finfo->file($path);
            header("Content-Type: $type");
            header("Content-Length: " . filesize($path));
            readfile($path);
            exit();
        }
    }
}
