<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $label;
    public $placeholder;
    public $name;
    public $options;
    public $model;
    public $description;
    public $inline;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name,  $options, $description, $inline = false, $model = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->model = $model;
        $this->options = $options;
        $this->description = $description;
        $this->inline = $inline;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('viewcreator::components.checkbox');
    }
}
