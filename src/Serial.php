<?php

namespace Codedcell\ViewCreator;

use Carbon\Carbon;
use Codedcell\ViewCreator\Models\Counter;

class Serial
{


    public function __construct()
    {
    }

    public function generateNext($type, $date = null)
    {
        if (is_null($date)) {
            $date = Carbon::today();
        }

        $counter = Counter::firstOrCreate(array(
            'month' => $date->month,
            'year' => $date->year,
            'date' => $date->day,
            'whole_date' => $date,
            'type' => $type,
        ));
        //dd($counter);
        $counter->increment('serial');

        return $counter;
    }
}
