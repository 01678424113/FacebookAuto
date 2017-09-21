<?php

namespace App\Http\Controllers;
use App\CategoriesPage;
use App\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
}
