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

    public function editContentAction()
    {
        if (!empty($_POST)) {
            // var_dump($_POST);
            // exit();
            $this->tasksModel->editTaskContent($_POST['id'], $_POST['title'], $_POST['content']);
            $this->request->redirect('tasks');
        }

        if (!isset($_GET['id'])) {
            echo 'error';
            exit();
        }

        $taskId = $_GET['id'];
        $task = $this->tasksModel->getTaskInformation($taskId);

        $this->view->render('editTask', $task);
    }
}
