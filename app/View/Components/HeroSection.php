<?php

namespace App\View\Components;

use App\Models\Project;
use App\Models\Service;
use Illuminate\View\Component;

class HeroSection extends Component
{
    public $hero = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        Service::orderBy('created_at','DESC')->limit(3)->get(['id','image'])
            ->map(function($item){
                array_push($this->hero,$item->image_url);
            });
        Project::orderBy('created_at','DESC')->limit(3)->get(['id','image'])
            ->map(function($item){
                array_push($this->hero,$item->image_url);
            });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.hero-section');
    }
}
