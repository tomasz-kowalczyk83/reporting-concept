<?php

namespace App\Report\ChartData\Course;

use Carbon\Carbon;

class CourseViews
{
    protected $from;

    protected $to;

    public function __construct(Carbon $from, Carbon $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function data()
    {
        return [
          "2018-02-22" => 1,
          "2018-02-23" => 4
        ];
    }

    public function title()
    {
        return 'Courses viewed detail';
    }

    public function haxis()
    {
        return ['title' => 'Course'];
    }

    public function vaxis()
    {
        return [
            'title' => 'Views',
            'minValue' => 0,
            'maxValue' => 5
        ];
    }

    public function columns()
    {
        return [
            ['type' => 'string', 'label' => 'Course'],
            ['type' => 'number', 'label' => 'Views']
        ];
    }
}
