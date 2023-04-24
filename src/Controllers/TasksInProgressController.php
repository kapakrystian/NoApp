<?php

namespace App\Controllers;

class TasksInProgressController extends Controller
{
    public function indexAction()
    {

        $this->view->render('tasksInProgress');
    }
}
