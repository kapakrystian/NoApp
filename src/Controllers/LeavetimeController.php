<?php

namespace App\Controllers;

class LeavetimeController extends Controller
{
    public function indexAction()
    {

        $this->view->render('leavetime');
    }
}
