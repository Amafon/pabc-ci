<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Communication extends BaseController
{
    public function index()
    {
        return view('admin\Views\Communication\index.php');
    }
}
