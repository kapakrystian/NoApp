<?php

namespace App\Models;

use App\Models\Model;
use App\Models\TasksModelInterface;

class TasksModel extends Model implements TasksModelInterface
{
    public function addTask($title, $content, $importance, $autor)
    {
        $sql = "INSERT INTO tasks (title, content, importance, autor) VALUES ('{$title}', '{$content}', '{$importance}', '{$autor}')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getTask(int $status = 0)
    {
        $sql = "
            SELECT ta.*, us.name_surname
            FROM tasks ta
            INNER JOIN users us ON ta.autor = us.id
        ";

        if (!empty($status)) {
            $sql .= 'WHERE status = ' . $status;
        }

        $result = $this->conn->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}
