<?php

namespace App\Models;

use App\Models\Model;
use App\Models\LeavetimeModelInterface;

class LeavetimeModel extends Model implements LeavetimeModelInterface
{
    public function addEvent($title, $start_date, $end_date, $user_id)
    {
        $sql = "INSERT INTO events (title, start_date, end_date, user_id) VALUES ('{$title}', '{$start_date}', '{$end_date}', '{$user_id}')";
        $result = $this->conn->query($sql);
        return $result;
    }

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
}
