<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CategoriesPageController extends Controller
{

    public function getPostPage()
    {
        return view('pages.post-page');
    }

    public function getPostGroup()
    {
        return view('pages.post-group');
    }
}
