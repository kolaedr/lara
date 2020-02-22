<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use DB;

class HomeControllerNew extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        // dd(1);
        $title = 'Home page ';
        $news = News::all();
        // $news = DB::table('news')
        //     ->join('categories', 'news.category_id', '=', 'categories.id')
        //     ->select('news.*', 'categories.name as cat')
        //     ->get();
        $categories = Category::all();
        $newsCountAll = DB::table('news')->count();
        $newsCount = DB::table('categories')
            ->join('news', 'category_id', '=', 'categories.id')
            ->groupBy('categories.id')
            ->select('categories.id', DB::raw('count(1) AS count'))->get();
        //подключается файл с папки resources/views/home/index.blade.php
        return view('home.index', compact('title', 'news', 'categories', 'newsCountAll', 'newsCount'));
    }

    public function contacts()
    {
        $title = 'Contact Us';
        // $subTitle = '<em>Users</em>';
        // $user = ['Masha', 'Lena'];
        //подключается файл с папки resources/views/home/index.blade.php
        return view('home.contacts', compact('title'));
    }

    public function profile()
    {
        $title = 'Profile';
        // $subTitle = '<em>Users</em>';
        // $user = ['Masha', 'Lena'];
        //подключается файл с папки resources/views/home/index.blade.php

        // $user = auth()->user();
        // $users = $user->name
        // print($user->id);

        // print($user->name);

        return view('home.profile', compact('title'));
    }

    public function getContacts(Request $request)
    {
        // dd($request);
        //$request - все данные формы находяться в обьекте как свойства
        $name = $request->name;
        $message = $request->message;
        //отправляем почту
        return redirect('/');
    }

    public function product($id)
    {
        $title = $id;
        return view('home.product', compact('title'));
    }

    public function productReview($id, $id_review)
    {
        $title = $id.' '.$id_review;

        return view('home.product', compact('title'));
    }

    public function search(Request $request)
    {
        $s= $request->s;
        $news = News::with('category')
            ->where('title', 'LIKE', '%'.$s.'%')
            ->orWhere('content', 'LIKE', '%'.$s.'%')
            ->paginate(2);
        
        return view('home.search', compact('news', 's'));
    }
}
