<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Articles extends BaseController
{
    public function index()
    {
        return view('Articles/index.php');
    }

    public function show()
    {
        return view('Articles/show.php');
    }
}
