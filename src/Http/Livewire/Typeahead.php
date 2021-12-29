<?php

namespace  Codedcell\ViewCreator\Http\Livewire;


use Livewire\Component;


class Typeahead extends Component
{
    public $options;
    public $value;
    public $label;
    public $show = false;
    protected $rules = [
        'readme.semver_version' => '',

    ];

    public function mount($options = null, $value = null)
    {
        //  dd($options);
        $this->options = $options;
    }

    public function toggleShow()
    {
        $this->show = !$this->show;
    }

    public function setValue($value)
    {
        $this->value = $value;
        $this->label = $this->options[$value];
        $this->toggleShow();
    }


    public function render()
    {
        return view('viewcreator::livewire.typeahead');
    }
}
