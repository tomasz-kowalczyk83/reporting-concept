<?php

namespace App\Report;
use App\Report\Charts\ChartInterface;

interface ReportInterface
{
    public function collect();
}
