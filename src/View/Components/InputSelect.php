<?php

namespace Codedcell\ViewCreator\View\Components;

use Illuminate\View\Component;

class InputSelect extends Component
{
    public $label;
    public $placeholder_input;
    public $name_input;
    public $placeholder_select;
    public $name_select;
    public $selectOptions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $nameInput, $placeholderInput = null, $nameSelect, $placeholderSelect = null, $selectOptions = [])
    {

        $this->label = $label;
        $this->name_input = $nameInput;
        $this->placeholder_input = $placeholderInput;
        $this->name_select = $nameSelect;
        $this->placeholder_select = $placeholderSelect;
        $this->selectOptions = $selectOptions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('viewcreator::components.input-select');
    }
}
