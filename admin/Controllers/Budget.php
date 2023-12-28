<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Budget extends BaseController
{
    public function index()
    {
        return view('admin\Views\Budget\index.php');
    }
}
