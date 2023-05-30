<?php

namespace App\Models;

use App\Models\Model;
use App\Models\LeavetimeModelInterface;

class LeavetimeModel extends Model implements LeavetimeModelInterface
{
    // funkcja dodająca wydarzenia
    public function addEvent($title, $start_date, $end_date, $user_id)
    {
        $sql = "INSERT INTO events (title, start_date, end_date, user_id) VALUES ('{$title}', '{$start_date}', '{$end_date}', '{$user_id}')";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja pobierająca wydarzenia do kalendarza
    public function getEvents($start_date, $end_date, $status)
    {
        $sql = "
            SELECT ev.end_date, ev.start_date, ev.title, us.name_surname FROM events ev
            LEFT JOIN users us ON ev.user_id = us.id
            WHERE start_date BETWEEN '$start_date' AND '$end_date' AND end_date BETWEEN '$start_date' AND '$end_date' AND status = '$status'
        ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja pobierająca urlopy do potwierdzenia
    public function getLeavetimeAdmin(): array
    {
        $sql = "
                SELECT ev.*, us.name_surname
                FROM events ev
                INNER JOIN users us ON ev.user_id = us.id
                WHERE ev.status = 'NIEPOTWIERDZONE'
            ";

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    //funkcja potwierdzająca godzinę
    public function acceptLeavetime($id)
    {
        $sql = "
                UPDATE events ev SET ev.status = 'POTWIERDZONE' WHERE ev.id = $id
            ";
        $result = $this->conn->query($sql);
        return $result;
    }

    //funkcja pobierająca wydarzenia do listy
    public function getEventsList($user = '')
    {
        $user = $_SESSION['user_id'];

        $sql = "
            SELECT ev.*, us.name_surname FROM events ev
            INNER JOIN users us ON ev.user_id = us.id
            WHERE ev.user_id = $user
        ";
        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    //funkcja usuwająca dodane wydarzenie
    public function deleteEvents($id)
    {
        $sql = "
                DELETE FROM events WHERE id = $id
            ";
        $result = $this->conn->query($sql);
        return $result;
    }
}
