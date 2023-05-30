<?php

namespace App\Controllers;

class LeavetimeEventsController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $events = $this->leavetimeModel->getEventsList();
        }
        $this->view->render('leavetimeEvents', $events);
    }

    public function deleteAction()
    {
        // if (empty($_POST)) {
        //     echo 'error';
        //     exit();
        // }
        $this->leavetimeModel->deleteEvents($_POST['id']);
    }
}
