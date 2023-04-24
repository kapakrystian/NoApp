<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->view->render('home');
    }
}