<?php

namespace App\Controllers;

class TasksAddingController extends Controller
{
    public function indexAction()
    {

        $this->view->render('tasksAdding');
    }
}
