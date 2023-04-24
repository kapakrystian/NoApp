<?php

namespace App\Models;

use App\Models\Model;
use App\Models\RegisterModelInterface;

class RegisterModel extends Model implements RegisterModelInterface
{

    //metoda sprawdzająca unikalność nazwy użytkownika
    private function isUsernameTaken($username): int
    {
        $sql = "SELECT * FROM users WHERE username = '{$username}'";
        $result = $this->conn->query($sql);
        $rows = $result->fetchAll(\PDO::FETCH_OBJ);

        if (count($rows) == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    //metoda sprawdzająca unikalność email
    private function isEmailTaken($email): int
    {
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = $this->conn->query($sql);
        $rows = $result->fetchAll(\PDO::FETCH_OBJ);

        if (count($rows) == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    //metoda dodająca użytkownika do bazy danych
    public function registerUser($username, $email, $password)
    {
        if ($this->isUsernameTaken($username)) {
            return false;
        }

        if ($this->isEmailTaken($email)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('{$username}', '{$email}', '{$hashedPassword}')";
        $result = $this->conn->query($sql);
        return $result;
    }
}
