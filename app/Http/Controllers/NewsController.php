<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Comment;

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
        // dd($news->category_id);
        $comments = Comment::where("news_id", $news->id)->orderByDesc("created_at")->get();
        $dataCategory = News::where("category_id", $news->category_id)->get();
        $dataTerbaru = News::orderBy('created_at', "desc")->get();
        $categories = Category::all();
        
        return view("admin.news.show", compact("news", "dataTerbaru", "comments", "dataCategory", "categories"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        $category = Category::all();
        return view("admin.news.edit", compact("news", "category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
        DB::transaction(function() use($request, $news){
            $validation = $request->validated();

            $validation["image"] = $validation[Str::slug("name")];
            if($request->hasFile("image")){
                $imagePath = $request->file('image')->store("images", "public");

                $validation["image"] = $imagePath;
            }

            $updateImage = $news->update($validation);
        });

        return redirect()->route("admin.news.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
