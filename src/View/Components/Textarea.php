<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $placeholder;
    public $name;
    public $rows;
    public $value = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder, $rows = 4, $model = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $model = json_decode($model);
        if ($model != null) {
            $default = $model->$name;
            $this->value = old($this->name, $default);
        } else {
            $this->value = old($this->name);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('viewcreator::components.textarea');
    }
}
