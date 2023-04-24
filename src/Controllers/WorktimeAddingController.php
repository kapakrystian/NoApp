<?php

namespace App\Controllers;

class WorktimeAddingController extends Controller
{
    public function indexAction()
    {

        $this->view->render('worktimeAdding');
    }
}