<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardTools extends Component
{
    public $stats;
    public $dropdown;
    public $tools;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stats = false, $dropdown=false, $tools= false)
    {
        $this->stats =  $stats;
        $this->dropdown =  $dropdown;
        $this->tools =  $tools;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-tools');
    }
}
