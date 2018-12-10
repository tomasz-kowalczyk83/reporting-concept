<?php

namespace App\Report;


class EnterpriseReport extends Report
{
  public function collect()
  {
      $this->charts = [
          app()->makeWith('App\Report\Charts\CourseCharts\CourseViewsChart', array('from' => $this->from, 'to' => $this->to))
      ];
  }
}
