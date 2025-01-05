<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('game_makers')
        ->where('user_id', Auth::id())
        ->where('prev_id', '0')
        ->orderBy('id', 'desc')
        ->paginate(5);


        // You can return the query result or pass it to a view
        return view('dashboard', ['query' => $query]);
    }

    public function store(Request $request)
    {
        //dd(request()->all());
        $publish = DB::table('game_makers')->where('id', $request->id)->value('publish');
        //dd($publish);
        if ($publish == 'off') {
            DB::table('game_makers')->where('id', $request->id)->update(['publish' => 'on']);
            return redirect()->route('dashboard');
        } else {
            DB::table('game_makers')->where('id', $request->id)->update(['publish' => 'off']);
            return redirect()->route('dashboard');
        }

    }
}
