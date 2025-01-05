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
        $title = $request->route('title');

        return response()->view('game_maker_next.index', ['prev_id' => $prev_id, 'title' => $title]);
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
        if ($request->select == '1') {
            return $this->extracted1($request, $uuid);
        } elseif ($request->select == '2') {
            return $this->extracted1($request, $uuid);
        } elseif ($request->select == '3') {
            return $this->extracted1($request, $uuid);
        } elseif ($request->select == '4') {
            return $this->extracted1($request, $uuid);
        } elseif ($request->select == '5') {
            return $this->extracted1($request, $uuid);
        } else {
            return $this->extracted1($request, $uuid);
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

        //$game_maker = json_decode($game_maker);
//        dd($game_maker);
        $game_end = $game_maker->count();
//        dd($game_end);
        if ($game_end === 0) {
            return to_route('dashboard');
        } else {
            return response()->view('game_maker_next.editnext', ['prev_id' => $prev_id, 'game_maker' => $game_maker[0]]);

        }
    }

    /**
     * editnext update
     */
    public function editnextupdate(Request $request)
    {
        $prev_id = $request->route('prev_id');
        $title = $request->route('title');
        $game_maker = DB::table('game_makers')
            ->where('prev_id', $prev_id)
            ->get();
        $game_end = $game_maker->count();
        if ($game_end === 0) {
            return to_route('dashboard');
        } else
        {
            return response()->view('game_maker_next.editnext', ['prev_id' => $prev_id,'titl' => $title, 'game_maker' => $game_maker[0]]);
        }

    }
    /**
     *  editnext save
     */

    /**
     * finish
     */
    public function finish(Request $request)
    {
        //$uuid = Uuid::uuid4()->toString();
        return $this->extracted($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * @param Request $request
     * @param string $uuid
     * @return RedirectResponse
     */
    public function extracted(Request $request): RedirectResponse
    {
        DB::table('game_makers')->insert([
                'user_id' => Auth::id(),
                'title' => $request->title,
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
                'next_id' => '0',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return to_route('dashboard');
    }

    /**
     * @param Request $request
     * @param string $uuid
     * @return void
     */
    public function getInsert(Request $request, string $uuid): void
    {
        DB::table('game_makers')->insert([
            'user_id' => Auth::id(),
            'title' => $request->title,
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
    }

    /**
     * @param Request $request
     * @param string $uuid
     * @return RedirectResponse
     */
    public function extracted1(Request $request, string $uuid): RedirectResponse
    {
        DB::table('game_makers')->insert([
                'user_id' => Auth::id(),
                'title' => $request->title,
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
        return to_route('game_maker_next', ['prev_id' => $uuid, 'title' => $request->title]);
    }
}
