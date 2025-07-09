<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cart_item extends Component
{
    public $delete;
    /**
     * Create a new component instance.
     */
    public function __construct($delete)
    {
        $this->delete = $delete;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart_item');
    }
}
