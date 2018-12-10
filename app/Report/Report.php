<?php

namespace App\Report;

use Carbon\Carbon;

abstract class Report implements ReportInterface
{
    public $from;

    public $to;

    public function __construct(Carbon $from, Carbon $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->chartManager = app('App\Report\Charts\ChartInterface');

        $this->collect();
    }
}
