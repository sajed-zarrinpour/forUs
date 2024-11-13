<?php

use App\Http\Controllers\PositionController;
use App\Livewire\Applications;
use App\Livewire\Positions;
use App\Livewire\SearchPositions;
use App\Models\Application;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Native\Laravel\Facades\Window;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
    Route::get('/', SearchPositions::class)->name('search-positions');
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
    
    Route::get('/files',function(Request $request){
        $filename = $request->query('filepath');
        return response( Storage::disk('public')->get($filename), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    })->name('serve');

    Route::get('/temp-files',function(Request $request){
        $filename = $request->query('filepath');
        $path = storage_path($filename);

        dd(Storage::temporaryUrl($filename, now()->addDay()));
        return response( Storage::disk('public')->get($filename), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
        
    })->name('serve-temp');
});




Route::post('/set-theme/{theme}', function ($theme, Request $request) {
    if (in_array($theme, ['light', 'dark'])) {
        $request->session()->put('theme', $theme);
    }
    return response()->json(['success' => true]);
});

