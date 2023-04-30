<?php

namespace App\Models;

interface HoursModelInterface
{
    public function addHour($day, $start_time, $end_time, $employee);
}
