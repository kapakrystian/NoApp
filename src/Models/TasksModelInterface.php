<?php

namespace App\Models;

interface TasksModelInterface
{
    public function addTask($title, $content, $importance, $autor);
}