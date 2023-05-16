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

    public function deleteAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->hoursModel->deleteHours($_POST['id']);
    }
}
