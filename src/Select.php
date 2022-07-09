<?php

namespace Codedcell\ViewCreator;

use Carbon\Carbon;
use Illuminate\Support\Str;


class Select
{
    protected $options;
    protected $label;
    protected $placeholder;
    protected $name;
    protected $isEntangle = false;
    protected $hideLabel = false;
    protected $entangleOptions;
    protected $isSearchable;

    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function hideLabel()
    {
        $this->hideLabel = true;
        return $this;
    }


    public function setLabel($label)
    {
        $this->label = $label;
        $this->placeholder = $label;
        return $this;
    }
    public function setOptionsEntangle($opts)
    {
        $this->entangleOptions = $opts;
        $this->isEntangle = true;
        return $this;
    }

    public function searchable(bool $ret)
    {
        $this->isSearchable = $ret;
    }

    public function render()
    {
        return view('viewcreator::components.select-template')
            ->with('options', $this->options)
            ->with('entangleOptions', $this->entangleOptions)
            ->with('isEntangle', $this->isEntangle)
            ->with('label', $this->label)
            ->with('hideLabel', $this->hideLabel)
            ->with('placeholder', $this->placeholder)
            ->with('name', $this->name)
            ->with('id', Str::replace('.', '_', $this->name));
    }
}
