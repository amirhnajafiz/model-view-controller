<?php

namespace app\controllers;

use app\core\Request;
use app\core\Application;
use app\controllers\HomeController;

class LoginController extends BaseController
{
    public function handleLogin(Request $request) {
        $data = $request->getBody();

        if ($data['email'] == 'admin@admin.com' && $data['password'] == '1234') {
            $hc = new HomeController();
            return $hc->home("Admin", $redirect=TRUE);
        } else {
            return $this->render('login');
        }
    }
}