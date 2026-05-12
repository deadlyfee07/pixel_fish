<?php

namespace App\Http\Controllers;

use App\Models\WikiBait;
use App\Models\WikiIngredient;
use App\Models\WikiRod;

class WikiController extends Controller
{
    public function index()
    {
        return view('wiki.index');
    }

    public function baits()
    {
        $baits = WikiBait::orderBy('id')->get();
        return view('wiki.baits', compact('baits'));
    }

    public function rods()
    {
        $rods = WikiRod::orderBy('id')->get();
        return view('wiki.rods', compact('rods'));
    }

    public function ingredients()
    {
        $ingredients = WikiIngredient::orderBy('id')->get();
        return view('wiki.ingredients', compact('ingredients'));
    }
}
