<?php

namespace App\Models;

class LoginModel extends Model implements LoginModelInterface
{
    public function checkUser($username, $password): int|array
    {
        $sql = "
            SELECT * 
            FROM users
            WHERE username = '$username'
        ";

        $result = $this->conn->query($sql);
        $result = $result->fetchAll(\PDO::FETCH_OBJ);

        if (empty($result)) {
            return 0;
        }

        if (password_verify($password, $result[0]->password)) {
            return $result;
        }

        return 0;
    }
}
