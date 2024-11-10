<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        return view('app.position.list', [
            'closest_deadlines' => Position::closest_dedlines(),
            'closest_interview' => Application::closest_interviews()
        ]);
    }
}
