<?php

namespace App\Report;

use App\Report\Charts\ChartInterface;


class CourseReport extends Report
{
    public $charts;

    public function collect()
    {
        $this->charts = [
            $this->chartManager::type('LineChart')
                                ->between($this->from, $this->to)
                                ->dataSource('App\Report\ChartData\Course\CourseViews')
                                ->get(),
            $this->chartManager::type('LineChart')
                                ->between($this->from, $this->to)
                                ->dataSource('App\Report\ChartData\Course\CourseCompletions')
                                ->get()
        ];
    }
}
