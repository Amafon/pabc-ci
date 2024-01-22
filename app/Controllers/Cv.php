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

class Cv extends BaseController
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
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {

            $articles = $this->model->select('articles.*, categories.label, users.first_name')
                ->join('categories', 'categories.id = articles.category_id')
                ->join('users', 'users.id = articles.user_id')
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        if ($this->request->getPost()) {

            $param = $this->request->getPost('param');

            $articles = $this->model->select('articles.*, categories.label, users.first_name')
                ->join('categories', 'categories.id = articles.category_id')
                ->join('users', 'users.id = articles.user_id')
                ->like('title', $param)
                ->orLike('description', $param)
                ->orLike('label', $param)
                ->orLike('first_name', $param)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        $categories = $this->catModel->findAll();

        foreach ($categories as $category) {

            $nb = count($this->model->where('category_id', $category->id)->findAll());

            $category->nb = $nb;
        }

        $articles2       = $this->model->findAll(4);

        $data = [
            'articles'  => $articles,
            'articles2'  => $articles2,
            'categories' => $categories,
        ];

        return view('Projets/cv.php', $data);
    }
}
