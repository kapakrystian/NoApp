<?php

namespace App\Controllers;

class WorktimeMonthSumController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $sumHours = $this->hoursModel->sumHoursByMonth($_SESSION['user_id']);
        }
        $this->view->render('worktimeMonthSum', $sumHours);
    }
}
