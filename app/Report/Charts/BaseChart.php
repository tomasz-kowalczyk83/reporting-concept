<?php

namespace App\Report\Charts;


use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Report\Charts\ChartTypeInterface;

abstract class BaseChart implements ChartTypeInterface
{
    protected $id;

    protected $options = [];

    protected $data = [];

    protected $cols = [];

    protected $rows = [];

    protected $range = [];

    protected $from;

    protected $to;

    public function __construct(Carbon $from, Carbon $to, $chartData)
    {
        $this->from = $from;
        $this->to = $to;
        $this->range = $this->range();

        $this->data = $this->formatData($chartData->data($from, $to));
        $this->options = $this->options($chartData);
        $this->columns = $chartData->columns();
    }

    public function range($inclusive = true)
    {
        if ($this->from->gt($this->to)) {
            return null;
        }

        // Clone the date objects to avoid issues, then reset their time
        $from = $this->from->copy()->startOfDay();
        $to = $this->to->copy()->startOfDay();

        // Include the end date in the range
        if ($inclusive) {
            $to->addDay();
        }

        $step = CarbonInterval::day();
        $period = new \DatePeriod($from, $step, $to);

        // Convert the DatePeriod into a plain array of Carbon objects
        $range = [];

        foreach ($period as $day) {
            $range[] = new Carbon($day);
        }

        return ! empty($range) ? $range : null;
    }

    public function options($chartData)
    {
        return array(
                  'title'  => $chartData->title(),
                  'width'  => 500,
                  'height' => 500,
                  'hAxis'  => $chartData->hAxis(),
                  'vAxis'  => $chartData->vAxis()
              );
    }
}
