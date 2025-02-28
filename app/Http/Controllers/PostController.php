<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Post::get();
        return view('blog.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $start = strtotime(date("Y-m-d H:i:s"));
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:1000'],
        ]);
        $record = Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        if ($record) {

            // $seconds = strtotime('2009-10-05 18:11:33') - strtotime('2009-10-05 18:11:13'); //for reference only
            $end = strtotime(date("Y-m-d H:i:s"));
            $record->education_time = $start - $end;
            $record->save();
            return redirect()->route('post.index')->with('success', 'Record  saved successfully');
        } else {
            return redirect()->route('post.index')->with('error', 'Failed to save the record');
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
}