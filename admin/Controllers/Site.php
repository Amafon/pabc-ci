<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Site extends BaseController
{
    public function index()
    {
        return view('admin\Views\Site\index.php');
    }
}
