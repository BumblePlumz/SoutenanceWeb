<?php

namespace App\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $this->render('pages/about', ["pageActive"=>"about"], "pagesTemplate");
    }
}