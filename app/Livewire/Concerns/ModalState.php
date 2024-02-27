<?php

namespace App\Livewire\Concerns;

use Livewire\Wireable;

class ModalState implements Wireable
{

    public function __construct(
        public bool $show = false,
        public $component = null,
        public $arguments = [],
    )
    {}

    public function toLivewire()
    {
        return [
            'show' => $this->show,
            'component' => $this->component,
            'arguments' => $this->arguments,
        ];
    }

    public static function fromLivewire($value)
    {
        return new static(
            show: $value['show'],
            component: $value['component'],
            arguments: $value['arguments'],
        );
    }
}