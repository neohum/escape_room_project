<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\RedirectResponse;

class GameMakerNextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $prev_id = $request->route('prev_id');

        return response()->view('game_maker_next.index', ['prev_id' => $prev_id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $uuid = Uuid::uuid4()->toString();
        if($request->select == '1'){

            DB::table('game_makers')->insert([
                'user_id' => Auth::id(),
                'editorjs' => $request->editorjs,
                'select' => $request->select,
                'question' => $request->question,
                'answer1' => $request->check1,
                'answer2' => $request->check2,
                'answer3' => $request->check3,
                'answer4' => $request->check4,
                'answer5' => $request->check5,
                'choice1' => $request->radio1,
                'choice2' => $request->radio2,
                'choice3' => $request->radio3,
                'choice4' => $request->radio4,
                'choice5' => $request->radio5,
                'prev_id' => $request->prev_id,
                'next_id' => $uuid,
                'created_at' => now(),
                'updated_at' => now()
            ]
          );
          return to_route('game_maker_next', ['prev_id' => $uuid]);
        } elseif($request->select == '2'){
            DB::table('game_makers')->insert([
              'user_id' => Auth::id(),
              'editorjs' => $request->editorjs,
              'select' => $request->select,
              'question' => $request->question,
              'answer1' => $request->check1,
              'answer2' => $request->check2,
              'answer3' => $request->check3,
              'answer4' => $request->check4,
              'answer5' => $request->check5,
              'choice1' => $request->radio1,
              'choice2' => $request->radio2,
              'choice3' => $request->radio3,
              'choice4' => $request->radio4,
              'choice5' => $request->radio5,
              'prev_id' => $request->prev_id,
              'next_id' => $uuid,
              'created_at' => now(),
              'updated_at' => now()
            ]);
            return to_route('game_maker_next', ['prev_id' => $uuid]);
        } elseif($request->select == '3'){
            DB::table('game_makers')->insert([
              'user_id' => Auth::id(),
              'editorjs' => $request->editorjs,
              'select' => $request->select,
              'question' => $request->question,
              'answer1' => $request->check1,
              'answer2' => $request->check2,
              'answer3' => $request->check3,
              'answer4' => $request->check4,
              'answer5' => $request->check5,
              'choice1' => $request->radio1,
              'choice2' => $request->radio2,
              'choice3' => $request->radio3,
              'choice4' => $request->radio4,
              'choice5' => $request->radio5,
              'prev_id' => $request->prev_id,
              'next_id' => $uuid,
              'created_at' => now(),
              'updated_at' => now()
            ]);
            return to_route('game_maker_next', ['prev_id' => $uuid]);
        } elseif($request->select == '4'){
            DB::table('game_makers')->insert([
              'user_id' => Auth::id(),
              'editorjs' => $request->editorjs,
              'select' => $request->select,
              'question' => $request->question,
              'answer1' => $request->check1,
              'answer2' => $request->check2,
              'answer3' => $request->check3,
              'answer4' => $request->check4,
              'answer5' => $request->check5,
              'choice1' => $request->radio1,
              'choice2' => $request->radio2,
              'choice3' => $request->radio3,
              'choice4' => $request->radio4,
              'choice5' => $request->radio5,
              'prev_id' => $request->prev_id,
              'next_id' => $uuid,
              'created_at' => now(),
              'updated_at' => now()
            ]);
            return to_route('game_maker_next', ['prev_id' => $uuid]);
        } else {

            DB::table('game_makers')->insert([
              'user_id' => Auth::id(),
              'editorjs' => $request->editorjs,
              'question' => $request->question,
              'select' => $request->select,
              'answer1' => $request->check1,
              'answer2' => $request->check2,
              'answer3' => $request->check3,
              'answer4' => $request->check4,
              'answer5' => $request->check5,
              'choice1' => $request->radio1,
              'choice2' => $request->radio2,
              'choice3' => $request->radio3,
              'choice4' => $request->radio4,
              'choice5' => $request->radio5,
              'prev_id' => $request->prev_id,
              'next_id' => $uuid,
              'created_at' => now(),
              'updated_at' => now()
            ]);
            return to_route('game_maker_next', ['prev_id' => $uuid]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $game = DB::table('game_makers')
            ->where('id', $id)
            ->get();
        $game_data = json_decode($game);
//        dd($game_data);
        return response()->view('game_maker_next.edit', ['game_data' => $game_data[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $game_data = DB::table('game_makers')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'editorjs' => $request->editorjs
            ]);
        //$prev_id = $request->next_id;
        $prev_id = $request->prev_id;


        return to_route('game_maker_next.editnext', ['prev_id' => $prev_id]);
    }

    /**
     * editnext
     */
    public function editnext(Request $request)
    {
        $prev_id = $request->route('prev_id');
        $game_maker = DB::table('game_makers')
            ->where('prev_id', $prev_id)
            ->get();

        $game_maker = json_decode($game_maker);
//        dd($game_maker);

        return response()->view('game_maker_next.editnext', ['prev_id' => $prev_id, 'game_maker' => $game_maker[0]]);
    }

    /**
     * editnext update
     */
    public function editnextupdate(Request $request)
    {
        $prev_id = $request->route('prev_id');
        $game_maker = DB::table('game_makers')
            ->where('prev_id', $prev_id)
            ->get();
        $game_maker = json_decode($game_maker);
        return response()->view('game_maker_next.editnext', ['prev_id' => $prev_id, 'game_maker' => $game_maker[0]]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
