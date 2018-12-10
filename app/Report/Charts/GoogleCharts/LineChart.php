<?php

namespace App\Report\Charts\GoogleCharts;


use Carbon\Carbon;
use App\Report\Charts\BaseChart;

class LineChart extends BaseChart
{
    public function formatData($data, $count = false)
    {
        $row = array();
        $i=0;

        foreach ($this->range as $adate) {
            $found = false;
            $row[$i][] = $adate;

            foreach ($data as $thedate => $l) {

                if ((new Carbon($thedate))->eq($adate)) {
                    if(is_array($l)) {
                        $row[$i] = array_merge($row[$i], $l);
                    } else {
                        $row[$i][] = $count ? count($l) : $l;
                    }

                    $found = true;
                }
            }
            if (!$found) {
                $row[$i][] = 0;
            }
            $i++;
        }
        return $row;
    }

    public function data()
    {
        return array(
            'message' => '',
            'chartType' => 'LineChart',
            'options' => $this->options,
            'rows' => $this->data,
            'columns' => $this->columns
        );
    }
}
