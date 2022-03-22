<?php

namespace  Codedcell\ViewCreator\Http\Livewire;


use Livewire\Component;


class Select extends Component
{
    public $options;
    public $value;
    public $label;
    public $selectedValue;
    public $name;
    public $show = false;
    public $sronly = false;
    protected $listeners = ['input'];

    protected $rules = [
        'readme.semver_version' => '',

    ];

    public function resetSelected()
    {
        $this->value = null;
        $this->selectedValue = null;
        $this->emitUp('input', $this->name, $this->selectedValue, $this->value);
    }
    public function input($name, $value)
    {

        if ($this->name == $name) {
            $this->setValue($value);
        }
        //dd($name, $value);
    }
    public function mount($name, $options = null, $value = null, $label = null, $sronly = false)
    {
        //dd($options);
        // dd($sronly);
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
        $this->label = $label;
        $this->sronly = $sronly;
    }

    public function toggleShow()
    {
        $this->show = !$this->show;
    }

    public function setValue($value)
    {
        if ($value != null || $value != "") {
            $this->value = $value;
            $this->selectedValue = $this->options[$value];
            $this->toggleShow();
            $this->emitUp('input', $this->name, $this->selectedValue, $value);
        } else {
            $this->resetSelected();
        }
    }


    public function render()
    {
        return view('viewcreator::livewire.select');
    }
}
