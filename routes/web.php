<?php

use App\Http\Controllers\PositionController;
use App\Livewire\Applications;
use App\Livewire\Positions;
use App\Models\Application;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Native\Laravel\Facades\Window;

Route::get('/', function(){
    return redirect('/login');
});

// Route::middleware(['auth'])->get('/custom-page', [CustomPageController::class, 'index'])->name('custom.page');
Route::middleware(['auth'])->get('menu-bar', function(){
    return view('menubar',[
        'closest_deadlines' => Position::closest_dedlines(),
        // 'closest_interview' => Application::closest_interviews()
    ]);
})->name('menu-bar');

Route::get('open-main-window', function () {
    Window::open()
        ->width(800)
        ->height(800)
        ->title('ForUs - Main Application')
        ->route('dashboard')
        ->rememberState()
        ->hideMenu();
    return back();
})->middleware('auth')->name('open-main-window');


// Route::get('/', [PositionController::class, 'index'])->name('position.index');
Route::prefix('positions')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function(){
    Route::get('/new', Positions::class)->name('positions.new');
    Route::get('{position}/edit/', Positions::class)->name('position.edit');

    Route::prefix('{position}/applications')->group(function(){
        Route::get('/new', Applications::class)->name('application.new');
        Route::get('{application}/view', Applications::class)->name('application.view');
        Route::get('{application}/edit/', Applications::class)->name('application.edit');
    });
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard',[
            'closest_deadlines' => Position::closest_dedlines(),
            'closest_interview' => Application::closest_interviews()
        ]);
    })->name('dashboard');
});


use Illuminate\Http\Request;

Route::post('/set-theme/{theme}', function ($theme, Request $request) {
    if (in_array($theme, ['light', 'dark'])) {
        $request->session()->put('theme', $theme);
    }
    return response()->json(['success' => true]);
});
