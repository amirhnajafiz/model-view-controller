<?php

namespace app\controllers;

class HomeController extends BaseController
{
    public function home($params, $redirect=FALSE) {
        if (!$redirect)
        {
            $data = [
                'name' => "Ehsan Kashfi"
            ];
        } else {
            $data = [
                'name' => $params
            ];
        }
        return $this->render('home', $data);
    }
}