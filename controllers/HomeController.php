<?php

namespace app\controllers;

class HomeController extends BaseController
{
    public function index($params) 
    {
        return $this->render('home');
    }

    public function about($params)
    {
        return $this->redirect('home');
    }
}