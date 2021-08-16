<?php

namespace app\controllers;

class HomeController extends BaseController
{
    public function index($params, $redirect=FALSE) {
        return $this->render('home');
    }
}