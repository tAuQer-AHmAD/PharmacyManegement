<?php

namespace App\Http\Controllers;
use App\Models\shoes;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Storage;
use File;

class ShoesControlle extends Controller
{
    public function store(Request $request)
    {
        $shoe = $request->all();
        $shoe['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('cover')) {
            // $shoe['cover'] = $request->cover->getClientOriginalName();
            // $shoe->cover->storeAs('shoes', $shoe['cover']);
            $shoe['cover'] = $request->file('cover')->store('docs');
        }
        shoes::create($shoe);
        return redirect()->route('shoes.index');
    }
    public function index()
    {
        $shoes = shoes::all();
        return view('shoes.index', compact('shoes'));
    }

    public function create()
    {
        return view('shoes.create');
    }

    public function download($uuid)
    {
        $shoe = shoes::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/'. $shoe->cover);
        return response()->download($pathToFile);
    }

    public function delete($uuid)
    {
        $shoe = shoes::where('uuid', $uuid)->firstOrFail();
        $pathToFile = unlink(storage_path('app/'. $shoe->cover));

        shoes::where('uuid', $uuid)->delete();
        return redirect()->route('shoes.index');
    }
}