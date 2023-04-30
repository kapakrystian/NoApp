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

    public function getHours($employee = ''): array
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

    public function getHoursAdmin(): array
    {
        $sql = "
            SELECT ho.*, us.name_surname
            FROM hours ho
            INNER JOIN users us ON ho.employee = us.id
            WHERE ho.status_ho = 'NIEPOTWIERDZONE'
        ";

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUsers(): array
    {
        $sql = "
            SELECT *
            FROM users us
            WHERE us.permissions = 2
        ";

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}
