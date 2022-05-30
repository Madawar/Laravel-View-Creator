<?php

namespace Codedcell\ViewCreator\Macros;

use Livewire\Component;
use PDF;

class Report
{
    public  ?Component $component = null;
    public  string $type;

    public function __construct(?string $type = "pdf", ?Component &$component = null)
    {
        $this->component = $component;
        $this->type = $type;
    }


    public function pdf($data, $filename = "Report.pdf")
    {
        $data = $data;
        $view = $this->component->report_folder;
        $pdf = PDF::loadView($view, compact('data'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            $filename
        );
    }
    public function __destruct()
    {
        // $this->generate();
    }
}
