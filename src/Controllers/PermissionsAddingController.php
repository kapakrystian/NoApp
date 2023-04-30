<?php

namespace App\Controllers;

class PermissionsAddingController extends Controller
{
    public function indexAction()
    {
        if (true) {
            $users = $this->hoursModel->getUsers();
        }
        $this->view->render('permissionsAdding', $users);
    }
}
