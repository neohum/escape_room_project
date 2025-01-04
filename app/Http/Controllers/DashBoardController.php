<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index()
    {
        $query = DB::table('game_makers')
        ->where('user_id', Auth::id())
        ->where('prev_id', '0')
        ->orderBy('id', 'desc')
        ->paginate(5);

        // You can return the query result or pass it to a view
        return view('dashboard', ['query' => $query]);
    }
}
