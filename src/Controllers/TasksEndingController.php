<?php

namespace App\Controllers;

use App\Constants\TasksStatus;

class TasksEndingController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $tasks = $this->tasksModel->getTask(TasksStatus::ENDING);
        }
        $this->view->render('tasks', $tasks);
    }
}
