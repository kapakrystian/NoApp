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

    public function addPermissionsAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->hoursModel->addPermissions($_POST['id']);
    }

    public function deletePermissionsAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->hoursModel->deletePermissions($_POST['id']);
    }

    public function deleteUsersAction()
    {
        if (empty($_POST)) {
            echo 'error';
            exit();
        }
        $this->hoursModel->deleteUsers($_POST['id']);
    }
}
