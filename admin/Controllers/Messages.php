<?php

namespace admin\Controllers;

use App\Controllers\BaseController;

class Messages extends BaseController
{
    public function index()
    {
        return view('admin\Views\Messages\index.php');
    }
}
