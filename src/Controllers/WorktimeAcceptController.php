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
}
