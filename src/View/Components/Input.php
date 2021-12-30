<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $placeholder;
    public $name;
    public $value;
    public $model;
    public $icon;
    public $hint;
    public $icoplacement;
    public $livewire;
    public $sronly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder = null, $description = null, $hint = null, $model = null, $icon = false, $icoplacement, $livewire = true, $sronly = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->hint = $hint;
        $this->icon = $icon;
        $this->placeholder = $placeholder;
        $this->icoplacement = $icoplacement;
        $this->livewire = $livewire;
        $this->sronly = $sronly;
        //dd($this->icoplacement);
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
        return view('viewcreator::components.input');
    }
}
