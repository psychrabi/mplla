<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class NavLink extends Component
{
    public $href;
    public $active;
    public $icon;

    public function __construct($href, $active = null, $icon = 'far fa-circle')
    {
        $this->href = $href;
        $this->active = $active ?? $href;
        $this->icon = $icon;
    }

    public function render()
    {

        $classes = ['active' => $this->isActive()];


        return view('components.nav-link', [
            'class' => Arr::toCssClasses($classes)
        ]);
    }

    protected function isActive(): bool
    {
        if (is_bool($this->active)) {
            return $this->active;
        }

        if (request()->is($this->active)) {
            return true;
        }

        if (request()->fullUrlIs($this->active)) {
            return true;
        }

        return request()->routeIs($this->active);
    }
}
