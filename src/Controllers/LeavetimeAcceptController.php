<?php

namespace App\Controllers;

class LeavetimeAcceptController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $leavetime = $this->leavetimeModel->getLeavetimeAdmin();
        }
        $this->view->render('leavetimeAccept', $leavetime);
    }

    public function acceptLeavetimeAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->leavetimeModel->acceptLeavetime($_POST['id']);
    }
}
