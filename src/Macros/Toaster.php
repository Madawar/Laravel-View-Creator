<?php

namespace Codedcell\ViewCreator\Macros;

use Livewire\Component;

class Toaster
{
    public  ?Component $component = null;
    public  string $message;
    public  string $type;
    public  bool $persistent = false;
    public    int $timeout = 5000;

    public function __construct(?string $message = null, ?string $type = "info", ?Component &$component = null)
    {
        $this->component = $component;
        $this->message = $message;
        $this->type = $type;
    }


    public function message(string $message = null, string $type = "info")
    {
        $this->type =   $type;
        if ($message) {
            $this->message  =   $message;
        }
        return $this;
    }


    public function success(?string $message = null)
    {
        return $this->message($message, 'success');
    }


    public function info(?string $message = null)
    {
        return $this->message($message, 'info');
    }


    public function warning(?string $message = null)
    {
        return $this->message($message, 'warning');
    }


    public function error(?string $message = null)
    {
        return $this->message($message, 'error');
    }


    public function persistent()
    {
        $this->persistent   =   true;
        return $this;
    }


    public function timeout(int $milliseconds)
    {
        $this->timeout = $milliseconds;
        return $this;
    }


    public function generate()
    {
        if (!$this->message) {
            return;
        }
        $payload    =   [
            "type"          => ($this->type ?: "info"),
            "message"       =>  $this->message,
            "persistent"    =>  $this->persistent,
            "timeout"        =>    $this->timeout
        ];

        if ($this->component && empty($this->component->redirectTo)) {
            $this->component->dispatchBrowserEvent('livewire-toaster', $payload);
        } else {
            session()->flash('livewire.toaster', $payload);
        }
    }



    public function __destruct()
    {
        $this->generate();
    }
}
