<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $title = 'Home page';
        $subTitle = '<em>Users</em>';
        $user = ['Masha', 'Lena'];
        //подключается файл с папки resources/views/home/index.blade.php
        return view('home.index', compact('title', 'subTitle', 'user'));
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
}
