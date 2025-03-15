<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $abouts = About::all();
        return view("admin.about.index", compact("abouts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.about.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validation = $request->validated();

            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store("images", "public");

                $validation["image"] = $imagePath;

                $aboutStore = About::create($validation);
            }
        });

        return redirect()->route("admin.about.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
        return view("admin.about.edit", compact("about"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAboutRequest $request, About $about)
    {
        //
        DB::transaction(function () use ($request, $about) {
            $validation = $request->validated();

            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store("images", "public");
                $validation["image"] = $imagePath;
            }
            $updateAbout = $about->update($validation);
        });

        return redirect()->route("admin.about.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
        DB::beginTransaction();
        try {
            $about->delete();
            DB::commit();
            return redirect()->route("admin.about.index");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("admin.about.index");
        }
    }
}
