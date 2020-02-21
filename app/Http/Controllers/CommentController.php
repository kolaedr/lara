<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:100|min:3',
            'comment' => 'required|min:3',
        ]);

        $comments = new Comment();     //в модели все столбцы таблицы записываются в свойства


        $comments->name = $request->name;
        $comments->comment = $request->comment;
        $comments->news_id = $request->news;
        $comments->save();

        return redirect('news/'.$request->news)->with('success', 'Comment: ' . $comments->comment . ' added!');
    }

    public function storeR(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:100|min:3',
            'comment' => 'required|min:3',
        ]);

        $comments = new Comment();     //в модели все столбцы таблицы записываются в свойства


        $comments->name = $request->name;
        $comments->comment = $request->comment;
        $comments->news_id = $request->news;
        $comments->save();
        $succses = 'succses';
        return response()->json($succses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('news_id', '=', $id)->get();
        return response()->json($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comm = Comment::find($id);
        $comm->delete();
        return redirect('news')->with('success', 'Category with id: ' . $comm->id . ' DELETED!');
    }
}
