<?php
namespace App\controllers;

class RouterController extends Controller
{
    public function index()
    {
        $this->render('pages/home');
    }
}