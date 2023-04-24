<?php

namespace App\Controllers;

class WorktimeController extends Controller
{
    public function indexAction()
    {

        $this->view->render('worktime');
    }
}
