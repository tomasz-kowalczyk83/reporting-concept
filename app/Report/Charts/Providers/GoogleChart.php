<?php

namespace App\Report\Charts\Providers;

use App\Report\Charts\Chart;

class GoogleChart extends Chart
{
    public function namespace()
    {
        return 'App\\Report\\Charts\\GoogleCharts\\';
    }
}
