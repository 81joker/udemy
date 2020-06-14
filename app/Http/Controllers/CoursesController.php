<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
{
    public function index($slug){

        $course = Course::where('slug' , $slug)->first();
        return view('course' , compact('course'));

		
    }
}
