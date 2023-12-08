<?php

namespace App\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $this->render('pages/contact', ["pageActive"=>"contact"], "pagesTemplate");
    }
}