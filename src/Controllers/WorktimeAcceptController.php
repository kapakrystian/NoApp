<?php

namespace App\Controllers;

class WorktimeAcceptController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $hours = $this->hoursModel->getHoursAdmin();
        }
        $this->view->render('worktimeAccept', $hours);
    }

    public function acceptHoursAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->hoursModel->acceptHours($_POST['id']);
    }

    public function rejectHoursAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->hoursModel->rejectHours($_POST['id']);
    }
}
