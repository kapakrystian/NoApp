<?php

namespace App\Controllers;

class LeavetimeAddingController extends Controller
{
    public function indexAction()
    {
        $error_message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = trim($_POST["title"]);
            $start_time = trim($_POST["start_time"]);
            $end_time = trim($_POST["end_time"]);
            $user_id = trim($_SESSION["user_id"]);

            if (empty($title) || empty($start_time) || empty($end_time) || empty($user_id)) {
                $error_message = "Wypełnij wszystkie pola";
            } else {
                if ($this->leavetimeModel->addEvent($title, $start_time, $end_time, $user_id)) {
                    $this->request->redirect('leavetime');

                    exit();
                } else {
                    $error_message = "Dodanie nowego wydarzenia nie powiodło się. Spróbuj ponownie";
                }
            }
            return $error_message;
        }

        $this->view->render('leavetimeAdding');
    }
}
