<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view("admin.dashboard.index");
    }

    public function indexUser(){
        $datas = News::all();
        $categories = Category::all();
        return view("user.dashboard.index", compact("datas", "categories"));
    }

    public function category(Category $category){

        $categories = Category::all();
        $category_slug = Category::where("slug", $category->slug)->first();
        $datas = News::where("category_id", $category_slug->id)->get();
    
        return view("user.dashboard.category", compact("datas", "categories"));
    }

    public function about(){
        $categories = Category::all();
        $abouts = About::all();

        return view("user.dashboard.about", compact("categories", "abouts"));
    }
}
