<?php

namespace App\Controllers;

class MyProfileController extends Controller
{
    public function indexAction()
    {

        $this->view->render('myProfile');
    }
}
