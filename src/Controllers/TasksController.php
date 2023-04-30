<?php

namespace App\Controllers;

class TasksController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $tasks = $this->tasksModel->getTask();
        }
        $this->view->render('tasks', $tasks);
    }
}
