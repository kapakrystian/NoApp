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
        if (!empty($_POST)) {
            $this->myProfileModel->editProfileInformation($_POST);
            $this->request->redirect('/myProfile');
        }

        if (true) {
            $profile = $this->myProfileModel->getUserInformations();
        }

        $this->view->render('editProfile', $profile);
    }
}
