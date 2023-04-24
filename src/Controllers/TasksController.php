<?php

namespace App\Controllers;

class TasksController extends Controller
{
    public function indexAction()
    {

        $this->view->render('tasks');
    }
}
