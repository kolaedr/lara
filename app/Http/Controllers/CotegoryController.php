<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;       //connection Model
use App\News;
use App\Comment;

class CotegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All category';
        $categories = Category::all();
        // dd($categories);

        return view('home.category', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create category';
        return view('home.create', compact('title'));
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
            'title' => 'required|max:100|min:3'
        ]);
        $category = new Category();     //в модели все столбцы таблицы записываются в свойства
        $category->name = $request->title;
        $category->save();

        return redirect('category')->with('success', 'Category with id: '.$category->id.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        // $comments = Comment::find($id);
        // $news = News::where('category_id', '=', $id)->get();
        $comments = Comment::where('news_id', '=', $id)->get();
        $news = News::where('category_id', '=', $id)->paginate(3);
        // $news = News::where('category_id', '=', $id)->simplePaginate(3);
        // dd($news);

        return view('home.show', compact('category', 'news', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        $title = 'Edit category '.$id;
        return view('home.edit', compact('title', 'categories'));
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
        $request->validate([
            'title' => 'required|max:100|min:3'
        ]);
        $category = Category::find($id);     //в модели все столбцы таблицы записываются в свойства
        $category->name = $request->title;
        $category->save();

        return redirect('category')->with('success', 'Category with id: '.$category->id.' update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('category')->with('success', 'Category with id: '.$category->id.' DELETED!');
    }
}
