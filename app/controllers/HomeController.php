<?php

namespace App\Controllers;
use Php22\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $title = 'Test';
        
        $this->render('index', compact('title'));
    }
}
