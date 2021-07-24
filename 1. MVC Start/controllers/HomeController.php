<?php

namespace app\controllers;

class HomeController extends BaseController
{

    public function home() {
        $data = [
            'name' => "Ehsan Kashfi"
        ];

        return $this->render('home', $data);
    }
}