<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
}
