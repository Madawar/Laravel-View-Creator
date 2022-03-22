<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class Date extends Component
{
    public $options;
    public $label;
    public $name;
    public $placeholder;
    public $sronly;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $options, $name, $placeholder, $sronly = false)
    {
        $this->options = $options;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->sronly = $sronly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('viewcreator::components.date');
    }
}
