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

class Home extends BaseController
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

        if (session('magicLogin')) {
            return redirect()->to('admin/set-password')
                ->with('message', 'Please update your password');
        }

        $articles      = $this->model->findAll(4);

        $data = [
            'articles' => $articles,
        ];

        return view('Home/index.php', $data);
    }

    public function sendEmail(string $subject, string $message)
    {
        $email = \Config\Services::email();
        $email->setTo("ugp@pabc-ci.org");
        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) {
            echo "Succès! Votre message a bien été envoyé. Nous vous reviendrons sous peu.";
        } else {
            echo "Erreur. Le message n'a pas été envoyé!";
        }
    }
}
