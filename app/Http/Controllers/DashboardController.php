<?php

namespace App\Http\Controllers;

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
        return view("user.dashboard.index", compact("datas"));
    }
}
