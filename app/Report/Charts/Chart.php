<?php

namespace App\Report\Charts;

use Carbon\Carbon;

abstract class Chart
{
    protected $from;

    protected $to;

    protected $namespace;

    protected $provider;

    public function __construct()
    {

    }

    public static function type($type)
    {
        $instance = new static;

        $instance->setType($type);

        return $instance;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function between(Carbon $from, Carbon $to)
    {
        $this->from = $from;
        $this->to = $to;

        return $this;
    }

    public function dataSource($dataSource)
    {
        $this->dataSource = app($dataSource);

        return $this;
    }

    public function get()
    {
        //dd($this->from, $this->to, $this->dataSource);
        return app()->makeWith($this->namespace().$this->type, [
            'from' => $this->from,
            'to' => $this->to,
            'chartData' => $this->dataSource
        ])->data();
    }
}
