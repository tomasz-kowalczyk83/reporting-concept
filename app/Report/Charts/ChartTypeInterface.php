<?php

namespace App\Report\Charts;

interface ChartTypeInterface
{
    public function formatData($data, $count = false);
}
