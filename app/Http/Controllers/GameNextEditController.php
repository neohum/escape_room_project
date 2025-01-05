<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GameNextEditController extends Controller
{
    //


    public function index(Request $request): \Illuminate\Http\Response
    {

        $game = DB::table('game_makers')
            ->where('id', $request->id)
            ->get();

        $game_data = json_decode($game);
//       dd($game_data);
        return response()->view('game_next_edit.index', ['game_data' => $game_data[0]]);
    }




    public function first_update(Request $request)
    {
        $game_data = DB::table('game_makers')
            ->where('id', $request->id)
            ->update([

                'editorjs' => $request->editorjs
            ]);

        $prev_id = $request->prev_id;

        return to_route('game_next_edit.index', ['id' => $request->id]);
    }

    public function update(Request $request)
    {

        $game_data = DB::table('game_makers')
            ->where('prev_id', $request->prev_id)
            ->update([
                'editorjs' => $request->editorjs,
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
            ]);

            return to_route('game_next_edit.edit', ['prev_id' => $request->prev_id]);



    }

    public function edit(Request $request)
    {
        $prev_id = $request->prev_id;



        $game_maker = DB::table('game_makers')
            ->where('prev_id', $prev_id)
            ->get();

        if ($game_maker->count() === 0) {
            return to_route('dashboard');
        }


        return response()->view('game_next_edit.edit', ['prev_id' => $request->prev_id, 'game_maker' => $game_maker[0]]);
    }

    public function delete(Request $request)
    {
        $title = DB::table('game_makers')
            ->where('id', $request->id)
            ->get('title');
        //dd($title[0]->title);

        DB::table('game_makers')
            ->where('title', $title[0]->title)
            ->delete();
        return to_route('dashboard');
    }

    public function finish(Request $request)
    {
        DB::table('game_makers')
            ->where('next_id', $request->next_id)
            ->update([
                'editorjs' => $request->editorjs,
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
            ]);
        return to_route('dashboard');
    }



}
