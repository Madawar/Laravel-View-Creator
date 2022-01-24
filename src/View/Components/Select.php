<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $placeholder;
    public $name;
    public $options;
    public $value;
    public $sronly;
    public $fuzzy;
    public $optionsvar;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder, $options = [], $sronly = false, $fuzzy = false, $optionsvar = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->sronly = $sronly;
        $this->fuzzy = $fuzzy;
        $this->optionsvar = $optionsvar;

        // dd($this->value);
    }

    /**
     * Determine if the given option is the currently selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isSelected($option)
    {
        return $option === $this->value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('viewcreator::components.select');
    }
}
