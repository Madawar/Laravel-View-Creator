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


    public function pdf()
    {
        $data = $this->component->query()->get();
        $filename = $this->component->filename;
        $pdf = PDF::loadView($filename, compact('data'))->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "filename.pdf"
        );
    }
    public function __destruct()
    {
        // $this->generate();
    }
}
