<?php

namespace App\Controllers;

class TasksAddingController extends Controller
{
    public function indexAction()
    {
        $error_message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = trim($_POST["title"]);
            $content = trim($_POST["content"]);
            $importance = trim($_POST["importance"]);
            $autor = trim($_SESSION["user_id"]);

            if (empty($title) || empty($content) || empty($importance) || empty($autor)) {
                $error_message = "Wypełnij wszystkie pola";
            } else {
                if ($this->tasksModel->addTask($title, $content, $importance, $autor)) {
                    $this->request->redirect('tasks');

                    exit();
                } else {
                    $error_message = 'Dodanie zadania nie powiodło się. Spróbuj ponownie';
                }
            }
            return $error_message;
        }
        $this->view->render('tasksAdding');
    }
}
