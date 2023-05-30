<?php

namespace App\Controllers;

class MyProfileController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $profile = $this->myProfileModel->getUserInformations();
        }
        $this->view->render('myProfile', $profile);
    }

    public function editAction()
    {
        $this->view->render('editProfile');
        echo 'chuj';
    }
}
