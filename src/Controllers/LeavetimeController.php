<?php

namespace App\Controllers;

class LeavetimeController extends Controller
{
    public function indexAction()
    {
        $this->view->render('leavetime');
    }

    public function getEventsAction()
    {
        $start = date("Y-m-d", strtotime($_POST['start']));
        $end = date("Y-m-d", strtotime($_POST['end']));
        $status = $_POST['status'];

        $result = $this->leavetimeModel->getEvents($start, $end, $status);
        $returnArray = [];

        if (!empty($result)) {
            foreach ($result as $value) {
                $returnArray[] = [
                    "title" => $value["name_surname"] . ' ~ ' . $value["title"],
                    "start" => (new \DateTime($value['start_date']))->format('Y-m-d\TH:i:s'),
                    "end" => (new \DateTime($value['end_date']))->format('Y-m-d\T23:59:59')
                ];
            }
        }
        header('Content-Type: application/json');
        echo json_encode($returnArray);
        exit;
    }
}
