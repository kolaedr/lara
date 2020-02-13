<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All news';
        // $news = News::all();
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name as cat')
            ->get();
        $categories = Category::all();
        $newsCountAll = DB::table('news')->count();
        $newsCount = DB::table('categories')
            ->join('news', 'category_id', '=', 'categories.id')
            ->groupBy('categories.id')
            ->select('categories.id', DB::raw('count(1) AS count'))->get();;
        // dd($newsCount);

        // return view('news.news', compact('title', 'news'));
        return view('news.index', compact('title', 'categories', 'news', 'newsCountAll', 'newsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add news';
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
            'category' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //upload images
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        $news = new News();     //в модели все столбцы таблицы записываются в свойства
        $news->title = $request->title;
        $news->content = $request->content;
        $news->img = $imageName;
        $news->category_id = $request->category;
        $news->save();

        return redirect('news')->with('success', 'News with id: ' . $news->title . ' added!');
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
        $news = News::find($id);
        $categories = Category::all();
        $title = 'Edit news ' . $id;
        return view('news.edit', compact('title', 'news', 'categories'));
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
            'title' => 'required|max:100|min:3',
            'content' => 'required|min:3',
            'category' => 'required',
            'img' => 'required_without:category|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $news = News::find($id);
        if ($request->img) {
            $imageName = time() . '.' . $request->img->extension();

            $request->img->move(public_path('images'), $imageName);
            $news->img = $imageName;
        }



        $news->title = $request->title;
        $news->content = $request->content;

        $news->category_id = $request->category;
        $news->save();

        return redirect('news')->with('success', 'Category with id: ' . $news->id . ' update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('news')->with('success', 'Category with id: ' . $news->id . ' DELETED!');
    }

    static function all()
    {
        $title = 'All news';
        // $news = News::all();
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name as cat')
            ->get();
        $categories = Category::all();
        $newsCountAll = DB::table('news')->count();
        $newsCount = DB::table('categories')
            ->join('news', 'category_id', '=', 'categories.id')
            ->groupBy('categories.id')
            ->select('categories.id', DB::raw('count(1) AS count'))->get();;
        // dd($newsCount);

        // return view('news.news', compact('title', 'news'));
        return  compact('title', 'categories', 'news', 'newsCountAll', 'newsCount');
    }
}