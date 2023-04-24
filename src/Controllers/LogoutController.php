<?php

namespace App\Controllers;

class LogoutController extends Controller
{
    public function indexAction()
    {
        session_destroy();
        $this->request->redirect('login');
    }
}
