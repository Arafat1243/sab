<?php

namespace App\View\Components;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class ServiceSection extends Component
{

    public $services;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->services = Cache::remember('service-cache', 60 * 60 *12, function () {
            return Service::all();
        });
        // dd($this->services);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.service-section');
    }
}
