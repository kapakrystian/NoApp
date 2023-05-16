<?php

namespace App\Models;

use App\Models\Model;
use App\Models\HoursModelInterface;

class HoursModel extends Model implements HoursModelInterface
{
    //funckja dodająca godziny
    public function addHour($day, $start_time, $end_time, $employee)
    {

        $start = $start_time;
        $end = $end_time;

        $diff = strtotime($end) - strtotime($start);
        $time_diff = date('H:i', $diff);

        $sql = "INSERT INTO hours (day, start_time, end_time, employee, hours_diff) VALUES ('{$day}', '{$start_time}', '{$end_time}', '{$employee}', '{$time_diff}')";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja pobierająca godziny danego użytkownika
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

    //funckja pobierająca godziny do potwierdzenia
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

    //funkcja pobierająca wszystkich userów
    public function getUsers(): array
    {
        $sql = "
            SELECT *
            FROM users
            WHERE permissions != 'SUPERADMIN';
        ";

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    //funkcja usuwająca dodaną godzinę
    public function deleteHours($id)
    {
        $sql = "
            DELETE FROM hours WHERE id = $id
        ";

        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja potwierdzająca godzinę
    public function acceptHours($id)
    {
        $sql = "
            UPDATE hours SET status_ho = 'POTWIERDZONE' WHERE id = $id
        ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja nadająca uprawnienia administratorskie
    public function addPermissions($id)
    {
        $sql = "
            UPDATE users SET permissions = 'ADMIN' WHERE id = $id
        ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja usuwająca uprawnienia administratorskie
    public function deletePermissions($id)
    {
        $sql = "
        UPDATE users SET permissions = 'USER' WHERE id = $id
    ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja usuwająca użytkownika
    public function deleteUsers($id)
    {
        $sql = "
            DELETE FROM users WHERE id = $id;
        ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja sumująca godziny z danego miesiąca
    public function sumTimeDiffByMonth()
    {
        $sql = "
        SELECT
        YEAR(start_time) AS year,
        MONTH(start_time) AS month,
        SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time))) AS total_seconds
        FROM
        hours
        GROUP BY
        YEAR(start_time), MONTH(start_time)
        ";

        $result = $this->conn->query($sql);
        return $result;
    }
}
