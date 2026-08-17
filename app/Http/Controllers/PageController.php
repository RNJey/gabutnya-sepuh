<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HallOfFame;

class PageController extends Controller
{

    // Fungsi untuk halaman About
    public function about()
    {
        return view('pages.about');
    }

    // Fungsi untuk halaman Hall of Fame
    public function hallOfFame()
    {
        $members = HallOfFame::all();
        return view('pages.hall_of_fame', compact('members'));
    }
}