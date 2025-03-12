<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, News $news)
    {
        //
        DB::transaction(function () use ($request){
            $validation = $request->validated();
            $storeComment = Comment::create($validation);
        });
        $data = News::findOrFail($request->news_id);

        return redirect()->route("news.show", $data->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
