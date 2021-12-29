<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;
    public $type;
    public $icon;
    public $options;
    public $model;
    public $description;
    public $inline;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $type, $icon = false)
    {
        $this->label = $label;
        $this->type = $type;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('viewcreator::components.button');
    }
}