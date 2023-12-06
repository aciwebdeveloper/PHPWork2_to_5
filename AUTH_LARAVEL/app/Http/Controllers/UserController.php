<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view("home");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {


        return view("screen.homeSignup");
    }

    public function LOGIN() {

        return view("screen.homeLogin");

    }

    public function loginCheck(Request $req) {
        $rules = [
            "email" => "required|email",
            "password" => "required",

        ];
        $messege = [
            "email.required" => "Email should not be empty",
            "email.email" => "Email format error",

            "password.required" => "Password should not be empty",

        ];

        $req->validate($rules, $messege);


        $email = $req->input("email");
        $psw = $req->input("password");



        // $encrypt = base64_encode($psw);

        // $combinePass = $psw;


        $credentials = [
            "email" => $email,
            "password" => $psw
        ];

        if(Auth::attempt($credentials)) {

            return redirect(route("home"))->with("success", "LOGIN SUCCESSFULL");
        } else {

            dd($credentials);
        }

    }

    public function USerRegister(Request $req) {

        $rules = [
            "email" => "required|email|unique:users",
            "password" => "required",
            "user_name" => "required"
        ];
        $messege = [
            "email.required" => "Email should not be empty",
            "email.email" => "Email format error",
            "email.unique" => "Email Already taken/exist",
            "password.required" => "Password should not be empty",
            "user_name.required" => "Name should not be empty",
        ];

        $req->validate($rules, $messege);

        $user_name = $req->input("user_name");
        $email = $req->input("email");
        $psw = $req->input("password");

        $hashPAss = Hash::make($psw);

        $encrypt = base64_encode($psw);



        // dd($combinePass);
        $data = [
            "name" => $user_name,
            "email" => $email,
            "password" => $hashPAss,
            "bactive" => $encrypt
        ];

        $insert = DB::table("users")->insert($data);

        if($insert) {
            return redirect(route("home"))->with("success", "YOU have been registered");
        } else {
            return redirect(route("home"))->with("error", "there is an error registration");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
