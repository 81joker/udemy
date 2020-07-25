<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

class MyCoursesController extends Controller{

    // public function __construct(){
    //     $this->middleware('auth'); 

    // }

    public function index(){
        
               $user = auth()->user();
               $user_mycourses = $user->courses;
    return view('mycourses' , compact('user_mycourses','user'));


    }
}
