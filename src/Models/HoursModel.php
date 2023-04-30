<?php

namespace App\Models;

use App\Models\Model;
use App\Models\HoursModelInterface;

class HoursModel extends Model implements HoursModelInterface
{
    public function addHour($day, $start_time, $end_time, $employee)
    {
        $sql = "INSERT INTO hours (day, start_time, end_time, employee) VALUES ('{$day}', '{$start_time}', '{$end_time}', '{$employee}')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getHours($employee = '')
    {
        $employee = $_SESSION['user_id'];

        $sql = "
            SELECT ho.*, us.username
            FROM hours ho
            INNER JOIN users us ON ho.employee = us.id
        ";

        if (!empty($employee)) {
            $sql .= "WHERE ho.employee = " . $employee;
        }

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}
