<?php

namespace App\Controllers;

class TasksEndingController extends Controller
{
    public function indexAction()
    {

        $this->view->render('tasksEnding');
    }
}
