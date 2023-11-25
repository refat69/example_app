<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\multipic;

class PortfolioController extends Controller
{
    public function Portfolio()
    {
        $images = multipic::all();
        return view('layouts.pages.portfolio', compact('images'));
    }
}
