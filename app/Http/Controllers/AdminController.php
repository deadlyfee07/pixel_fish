<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ForumLog;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalLogs = ForumLog::count();
        $users = User::latest()->get();

        return view('admin.index', compact('totalUsers', 'totalLogs', 'users'));
    }
}
