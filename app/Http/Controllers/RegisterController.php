<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function index(){
        return view("admin.register");
    }

    public function store(StoreRegisterRequest $request){
        DB::transaction( function() use($request){
            $validation = $request->validated();

            $storeRegister = User::create($validation);
        });

        return redirect()->route("login.index");
    }
}
