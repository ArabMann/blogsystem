<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $datas = News::all();
        return view("admin.news.index", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.news.create', compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validation = $request->validated();
            $validation["slug"] = Str::slug($validation["name"]);
            $validation["user_id"] = Auth::user()->id;

            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store('images', "public");
                $validation["image"] = $imagePath;
            };

            $storeNews = News::create($validation);
        });
        return redirect()->route("admin.news.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
        return view("admin.news.show", compact("news"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
