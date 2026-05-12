<?php

namespace App\Http\Controllers;

use App\Models\WikiRod;
use Illuminate\Http\Request;

class AdminWikiRodController extends Controller
{
    public function index()
    {
        $rods = WikiRod::latest()->get();
        return view('admin.rods', compact('rods'));
    }

    public function edit(WikiRod $rod)
    {
        $rods = WikiRod::latest()->get();
        return view('admin.rods', compact('rods', 'rod'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rod_name' => 'required|string',
            'upgrade_level' => 'required|string',
            'requirements' => 'required|string',
            'gem_cost' => 'required|integer',
        ]);

        WikiRod::create($data);

        return redirect()->route('admin.rods')->with('status', 'added');
    }

    public function update(Request $request, WikiRod $rod)
    {
        $data = $request->validate([
            'rod_name' => 'required|string',
            'upgrade_level' => 'required|string',
            'requirements' => 'required|string',
            'gem_cost' => 'required|integer',
        ]);

        $rod->update($data);

        return redirect()->route('admin.rods')->with('status', 'updated');
    }

    public function destroy(WikiRod $rod)
    {
        $rod->delete();

        return redirect()->route('admin.rods')->with('status', 'deleted');
    }
}
