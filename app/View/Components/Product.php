<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{
    public $image = '';
    public $name = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $name)
    {
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
