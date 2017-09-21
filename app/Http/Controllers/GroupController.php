<?php

namespace App\Http\Controllers;

use App\CategoriesPage;
use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $categories = CategoriesPage::all();
        $groups = Group::all();

    }
}
