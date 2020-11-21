<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ServiceModal extends Component
{
    public $service;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($service)
    {
        //
        $this->service = $service;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.service-modal');
    }
}
