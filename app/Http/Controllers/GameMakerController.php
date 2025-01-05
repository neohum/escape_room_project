<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use App\Models\GameMaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



class GameMakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return response()->view('game.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('game.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //


        $uuid = Uuid::uuid4()->toString();
        DB::table('game_makers')->insert([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'editorjs' => $request->editorjs,
            'prev_id' => '0',
            'next_id' => $uuid,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // if($create) {
        //     session()->flash('notification.success', 'Game created successfully!');
        //     return redirect()->route('game.index');
        // }
        return to_route('game_maker_next', ['prev_id' => $uuid, $request->title]);

      // return abort(500);
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function upload(Request $request)
    {
        $r = (object)[]; //it's will return values.

        if (($uploadedFile = $request->file('file')) === null) {
            $r->error = "Upload Fail: File is empty.";
            return json_encode($r);
        }

        if ($uploadedFile->getSize() > 10 * pow(1024, 2)) {
            $r->error = "Upload Fail: File is exceed 10 MB.";
            return json_encode($r);
        }

        $extensions = array(
            'png', 'jpg', 'jpeg', 'jpe', 'gif', 'svg', 'bmp', 'ico',

        );

        if (!in_array(strtolower($uploadedFile->getClientOriginalExtension()), $extensions)) {
            $r->error = "Upload Fail: Unacceptable extension.";
            return json_encode($r);
        }


        /**
           * Save File
         **/

        $file = Storage::upload($uploadedFile, 'public/editor');
        $r->url = sprintf("/storage/app/%s/%s", $file->path, $file->filename);

        return json_encode($r);
    }
}
