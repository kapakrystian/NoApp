<?php

namespace App\Controllers;

class TasksPendingController extends Controller
{
    public function indexAction()
    {

        $this->view->render('tasksPending');
    }
}
