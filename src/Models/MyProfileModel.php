<?php

namespace App\Models;

use App\Models\Model;
use App\Models\MyProfileModelInterface;

class MyProfileModel extends Model implements MyProfileModelInterface
{
    public function getUserInformations($user = "")
    {
        $user = $_SESSION['user_name'];

        $sql = "
            SELECT *
            FROM users us
        ";

        if (!empty($user)) {
            $sql .= "WHERE us.username = " . "'" . $user . "';";
        }

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function editProfileInformation($data)
    {
        $sql = "
            UPDATE users SET
        ";

        if (!empty($data['email'])) {
            $sql .= " email = '{$data['email']}'";
        }

        if (!empty($data['phone'])) {
            $sql .= ",phone = '{$data['phone']}'";
        }

        if (!empty($data['password'])) {
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $sql .= ",password = '{$hashedPassword}'";
        }

        $sql .= " WHERE id = {$_SESSION['user_id']}";

        // var_dump($sql);

        $result = $this->conn->query($sql);
        return $result;
    }
}
