<?php

namespace App\Models;

use App\Models\Model;
use App\Models\HoursModelInterface;
use DateInterval;

class HoursModel extends Model implements HoursModelInterface
{
    //funckja dodająca godziny
    public function addHour($day, $start_time, $end_time, $employee)
    {

        //obiekty klasy DateTime zapisujące dane o godzinach
        $start = new \DateTime($start_time);
        $end = new \DateTime($end_time);

        //warunek sprawdzający czy w trakcie pracy nie zmienia się dzień (zmiany nocne)
        if ($end < $start) {
            $end->add(new DateInterval('P1D'));
        }

        //wyliczenie różnicy godzin i zapisanie jej w formacie godzin i minut
        $diff = $end->diff($start);
        $time_diff = $diff->format('%H:%I');

        //wykonanie zapytania
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
    public function sumHoursByMonth($user_id)
    {

        $sql = "
        SELECT
        YEAR(day) AS year,
        MONTHNAME(day) AS month,
        TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(
          CASE
            WHEN end_time >= start_time THEN TIMEDIFF(end_time, start_time)
            ELSE TIMEDIFF('24:00:00', start_time) + TIMEDIFF(end_time, '00:00:00')
          END
        ))), '%H:%i') AS total_hours
        FROM
        hours
        WHERE employee = $user_id
        GROUP BY
        YEAR(day),
        MONTH(day)
        ";

        $result = $this->conn->query($sql);
        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

    public function getUsersMonthSumHours()
    {
        $sql = "
        SELECT
        YEAR(day) AS year,
        MONTHNAME(day) AS month,
        TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(
        CASE
        WHEN end_time >= start_time THEN TIMEDIFF(end_time, start_time)
        ELSE TIMEDIFF('24:00:00', start_time) + TIMEDIFF(end_time, '00:00:00')
        END
        ))), '%H:%i') AS total_hours,
        users.name_surname
        FROM
        hours
        INNER JOIN users ON hours.employee = users.id
        GROUP BY
        YEAR(day),
        MONTH(day),
        users.name_surname
        ";

        $result = $this->conn->query($sql);
        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
}
