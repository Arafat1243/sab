<?php

namespace App\View\Components;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ServiceSection extends Component
{

    public Collection $services;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $home = true)
    {
        //
        if($home){
            $this->services =  Service::orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();
        }else{
            $this->services = Service::orderBy('updated_at', 'desc')
            ->get();
        }
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
