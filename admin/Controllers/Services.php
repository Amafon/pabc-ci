<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Services extends BaseController
{
    public function index()
    {
        return view('admin\Views\Services\index.php');
    }
}
