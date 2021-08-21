<?php

namespace app\controllers;

class HomeController extends BaseController
{
    /**
     * In home controller this method renders index page. 
     *
     * @param [type] $params input params
     * @return void
     */
    public function index($params) 
    {
        return $this->render('home', ['name' => 'User']);
    }

    /**
     * This method renders about page
     *
     * @param [type] $params input params
     * @return void
     */
    public function about($params)
    {
        return $this->render('about');
    }
}