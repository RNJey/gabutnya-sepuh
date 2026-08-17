<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HallOfFame;

class PageController extends Controller
{
    public function hallOfFame()
    {
        $members = HallOfFame::all();
        
        return view('pages.hall_of_fame', compact('members'));
    }
}