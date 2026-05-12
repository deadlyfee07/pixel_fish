<?php

namespace App\Http\Controllers;

use App\Models\WikiBait;
use Illuminate\Http\Request;

class AdminWikiBaitController extends Controller
{
    public function index()
    {
        $baits = WikiBait::latest()->get();
        return view('admin.baits', compact('baits'));
    }

    public function edit(WikiBait $bait)
    {
        $baits = WikiBait::latest()->get();
        return view('admin.baits', compact('baits', 'bait'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_name' => 'required|string',
            'main_target' => 'required|string',
            'bonus_target' => 'required|string',
        ]);

        WikiBait::create($data);

        return redirect()->route('admin.baits')->with('status', 'added');
    }

    public function update(Request $request, WikiBait $bait)
    {
        $data = $request->validate([
            'item_name' => 'required|string',
            'main_target' => 'required|string',
            'bonus_target' => 'required|string',
        ]);

        $bait->update($data);

        return redirect()->route('admin.baits')->with('status', 'updated');
    }

    public function destroy(WikiBait $bait)
    {
        $bait->delete();

        return redirect()->route('admin.baits')->with('status', 'deleted');
    }
}
