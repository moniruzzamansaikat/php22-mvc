<?php

namespace App\Controllers;

use Php22\Controllers\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $this->json([
            "test" => "ok"
        ]);
    }
}