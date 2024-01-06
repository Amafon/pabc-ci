<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        return view('admin\Views\Profil\index.php');
    }
}
