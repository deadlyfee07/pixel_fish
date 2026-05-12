<?php

namespace App\Http\Controllers;

use App\Models\ForumLog;
use App\Models\WikiBait;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $logs = ForumLog::with('user')->latest()->get();
        return view('forum.index', compact('logs'));
    }

    public function create()
    {
        $baits = WikiBait::orderBy('item_name')->get();
        return view('forum.create', compact('baits'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bait_type' => 'required|string',
            'bait_amount' => 'required|integer',
            'fish_caught' => 'required|string',
            'ingredients' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        ForumLog::create($data);

        return redirect()->route('forum.index')->with('status', 'sukses');
    }

    public function destroy(ForumLog $log)
    {
        if (auth()->user()->role !== 'admin' && $log->user_id !== auth()->id()) {
            abort(403);
        }

        $log->delete();

        return redirect()->route('forum.index')->with('status', 'deleted');
    }
}
