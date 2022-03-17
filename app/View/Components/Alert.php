<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type = 'success';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $message = 'Quang cntt';
        return view('components.alert', compact('message'));
    }
}
