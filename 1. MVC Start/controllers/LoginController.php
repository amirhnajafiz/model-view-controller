<?php

namespace app\controllers;

use app\core\Request;
use app\core\Application;

class LoginController extends BaseController
{
    public function handleLogin(Request $request) {
        $data = $request->getBody();

        if ($data['email'] == 'admin@admin.com' && $data['password'] == '1234') {
            $data = [
                'name'=> 'Admin'
            ];
            return $this->render('home', $data);
        } else {
            return $this->render('login');
        }
    }
}