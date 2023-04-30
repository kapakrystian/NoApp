<?php

namespace App\Models;

interface RegisterModelInterface
{
    public function registerUser($username, $email, $password, $name_surname, $phone);
}
