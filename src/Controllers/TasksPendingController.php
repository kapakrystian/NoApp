<?php

namespace App\Controllers;

use App\Constants\TasksStatus;

class TasksPendingController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $tasks = $this->tasksModel->getTask(TasksStatus::PENDING);
        }
        $this->view->render('tasks', $tasks);
    }

     
}
