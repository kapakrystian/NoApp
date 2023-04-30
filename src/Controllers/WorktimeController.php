<?php

namespace App\Controllers;

class WorktimeController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $hours = $this->hoursModel->getHours();
        }
        $this->view->render('worktime', $hours);
    }
}
