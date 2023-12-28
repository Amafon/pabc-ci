<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin\Views\Admin\index.php');
    }
}
