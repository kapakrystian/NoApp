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
}
