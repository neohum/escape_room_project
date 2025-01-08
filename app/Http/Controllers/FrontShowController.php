<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class FrontShowController extends Controller
{
    public function index(){

        $query = DB::table('game_makers')
            ->where('prev_id', '0')
            ->where('publish', 'on')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('index', ['query' => $query]);
    }

    public function show($id){
        $game_maker = DB::table('game_makers')->where('id', $id)->first();
       return view('show.show', ['game_maker' => $game_maker]);
    }

    public function show_next(Request $request){
        $game_maker = DB::table('game_makers')
            ->where('prev_id', $request->prev_id)
            ->get();
        if ($game_maker->count() === 0) {
            return view('show.show_end');
        } else {


            return view('show.show', ['game_maker' => $game_maker[0]]);

        }
    }
}
