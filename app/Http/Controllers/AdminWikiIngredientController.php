<?php

namespace App\Http\Controllers;

use App\Models\WikiIngredient;
use Illuminate\Http\Request;

class AdminWikiIngredientController extends Controller
{
    public function index()
    {
        $ingredients = WikiIngredient::latest()->get();
        return view('admin.ingredients', compact('ingredients'));
    }

    public function edit(WikiIngredient $ingredient)
    {
        $ingredients = WikiIngredient::latest()->get();
        return view('admin.ingredients', compact('ingredients', 'ingredient'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ingredient_name' => 'required|string',
            'description' => 'required|string',
        ]);

        WikiIngredient::create($data);

        return redirect()->route('admin.ingredients')->with('status', 'added');
    }

    public function update(Request $request, WikiIngredient $ingredient)
    {
        $data = $request->validate([
            'ingredient_name' => 'required|string',
            'description' => 'required|string',
        ]);

        $ingredient->update($data);

        return redirect()->route('admin.ingredients')->with('status', 'updated');
    }

    public function destroy(WikiIngredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('admin.ingredients')->with('status', 'deleted');
    }
}
