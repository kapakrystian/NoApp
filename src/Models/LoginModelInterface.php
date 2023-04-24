<?php

namespace App\Models;

interface LoginModelInterface
{
    public function checkUser(string $username, string $password): int|array;
}