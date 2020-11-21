<?php

namespace App\Http\Controllers;

use App\Models\OtherContent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $others = OtherContent::first();
        return Inertia::render('Dashboard',compact('others'));
    }
}
