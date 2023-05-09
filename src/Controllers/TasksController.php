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

    public function editAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->tasksModel->changeTaskStatus($_POST['status'], $_POST['id']);
    }

    public function deleteAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->tasksModel->deleteTask($_POST['id']);
    }
}
