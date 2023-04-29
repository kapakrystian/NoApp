<?php

namespace App\Controllers;

use App\Constants\TasksStatus;

class TasksInProgressController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $tasks = $this->tasksModel->getTask(TasksStatus::IN_PROGRESS);
        }
        $this->view->render('tasks', $tasks);
    }
}
