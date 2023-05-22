<?php

namespace App\Controllers;

class WorktimeUsersMonthSumController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $usersHoursSum = $this->hoursModel->getUsersMonthSumHours();
        }
        $this->view->render('worktimeUsersMonthSum', $usersHoursSum);
    }
}
