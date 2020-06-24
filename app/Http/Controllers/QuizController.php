<?php

namespace App\Http\Controllers;

use App\Course;
use App\Quiz;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index($slug , $name) {

    $course = Course::where('slug' , $slug)->first();
    $quiz = $course->quizzes()->where('name' , $name)->first();
     return view('quiz' , compact('quiz'));

    }
    public function submit(Request $request, $slug , $name) {
       $quiz = Quiz::where('name' , $name)->first();
       $questions = $quiz->questions;
       $questions_ids  = [];
       $questions_right_answers = [];
       $quiz_score = 0;
       
    foreach ($questions as $question) {
        $questions_ids[] = $question->id;
        $questions_right_answers[] = $question->right_answer;
        $quiz_score += $question->score;
       

    }

    for ($i=0; $i < count($questions_ids); $i++) { 
        
        $your_answer = trim($request['answer'.$questions_ids[$i]]);

        $the_answer = trim($questions_right_answers[$i]);
        
        
     if ($your_answer != $the_answer) {
         return redirect()->back()->withStatus("Your Answer ({$your_answer}) is not Corect");
     }

    }

    $user = auth()->user();
    $user->quizzes()->attach([$quiz->id]);

    $user->score += $quiz_score;
    if ($user->save()) {
        return redirect("/course/" . $quiz->course->slug)->withStatus("Well done, You have Sloved {$quiz->name} Quiz and Your Score {$quiz_score} Point and Score The user {$user->score} For You");

    }


    
 }
}
