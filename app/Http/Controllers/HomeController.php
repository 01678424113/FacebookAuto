<?php

namespace App\Http\Controllers;
use App\CategoriesPage;
use App\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = CategoriesPage::all();
        $pages = Page::all();
        return view('pages.index',['categories'=>$categories,'pages'=>$pages]);
    }
}
