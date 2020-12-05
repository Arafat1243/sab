<?php

namespace App\View\Components;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class CountSection extends Component
{
    public $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($other)
    {
        //
        $project = Cache::remember('project-catch', 60 * 60 *12, function () {
            return  Project::all();
        });
        $this->count = [
            'running' => $project->collect()->where('status',0)->count(),
            'complete' => $project->collect()->where('status',1)->count(),
            'client' => $other->client,
            'employee' => $other->employee,
        ];
        // dd($this->count);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.count-section');
    }
}
