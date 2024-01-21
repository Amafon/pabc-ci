<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;
use App\Models\MessageModel;
use App\Entities\Article;
use App\Entities\Category;
use App\Entities\Message;
use RuntimeException;
use finfo;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{

    private ArticlesModel $model;
    private CategoriesModel $catModel;
    private UserModel $userModel;
    private MessageModel $messageModel;

    public function __construct()
    {
        $this->model        = new ArticlesModel();
        $this->catModel     = new CategoriesModel();
        $this->userModel    = new UserModel();
        $this->messageModel = new MessageModel();
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

    public function sendEmail()
    {
        $message = new Message($this->request->getPost());

        $id = $this->messageModel->insert($message);

        if ($id === false) {
            return redirect()->to('/#contact')
                ->with('errors', $this->messageModel->errors())
                ->withInput();
        }


        $email = \Config\Services::email();
        $email->setTo("afy.amafon@gmail.com");
        $email->setSubject($this->request->getPost('subject'));
        $email->setMessage($this->request->getPost('message'));
        if ($email->send()) {
            return redirect()->to('/#contact')
                ->with('message', 'Le message a été envoyé avec succès.');
        } else {
            return redirect()->back()
                ->with('errors', $this->messageModel->errors())
                ->withInput();
        }
    }
}
