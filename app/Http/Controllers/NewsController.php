<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All category';
        $news = News::all();
        $categories = Category::all();
        // dd($categories);
        
        // return view('news.news', compact('title', 'news'));
        return view('news.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create category';
        $news = new News();
        $categories = Category::all();
        // dd($categories);
        
        // return view('news.news', compact('title', 'news'));
        return view('news.create', compact('title', 'categories', 'news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100|min:3',
            'content' => 'required|min:3',
            'category' => 'required'
        ]);
        $news = new News();     //в модели все столбцы таблицы записываются в свойства
        $news->title = $request->title;
        $news->content = $request->content;
        $news->category_id = $request->category;
        $news->save();

        return redirect('news')->with('success', 'Category with id: '.$news->title.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
