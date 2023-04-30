<?php

namespace App\Controllers;

class WorktimeAddingController extends Controller
{
    public function indexAction()
    {

        $error_message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $day = trim($_POST["day"]);
            $start_time = trim($_POST["start_time"]);
            $end_time = trim($_POST["end_time"]);
            $employee = trim($_SESSION["user_id"]);

            if (empty($day) || empty($start_time) || empty($end_time) || empty($employee)) {
                $error_message = "Wypełnij wszystkie pola";
            } else {
                if ($this->hoursModel->addHour($day, $start_time, $end_time, $employee)) {
                    $this->request->redirect('worktime');

                    exit();
                } else {
                    $error_message = "Dodanie nowych godzin nie powiodło się. Spróbuj ponownie";
                }
            }
            return $error_message;
        }

        $this->view->render('worktimeAdding');
    }
}
