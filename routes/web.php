<?php

use App\Models\OtherContent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $other = OtherContent::first();
    return view('home',compact('other'));
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {

    // dashboard
    Route::get('/',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

    // service
    Route::resource('service',\App\Http\Controllers\ServiceController::class);
    Route::get('service-restore/{id}',[\App\Http\Controllers\ServiceController::class,'restore'])->name('service.restore');

    // Project
    Route::resource('project',\App\Http\Controllers\ProjectController::class);
    Route::get('project-restore/{id}',[\App\Http\Controllers\ProjectController::class,'restore'])->name('project.restore');

    Route::name('update-')->group(function(){
        Route::put('empolyee', [\App\Http\Controllers\OtherContentController::class,'empolyee'])->name('empolyee');
        Route::put('client', [\App\Http\Controllers\OtherContentController::class,'client'])->name('client');
        Route::put('whatweare', [\App\Http\Controllers\OtherContentController::class,'whatweare'])->name('whatweare');
        Route::put('about', [\App\Http\Controllers\OtherContentController::class,'about'])->name('about');
    });
});
