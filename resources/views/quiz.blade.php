@extends('layouts.user_layout')


@section('content')
<div class="container">
    <div class="quiz-container"> 
     {{-- <div class="row">
        <div class="col-sm-8">
    --}}
        <h2>{{\Str::limit($quiz->course->title,15)}} : {{$quiz->name}} Quiz</h2>
          
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        <div class="quiz-questions">
            <form action="" method="POST" autocomplete="off">
                @csrf
            @foreach ($quiz->questions as $questions)    
                <div class="form-group">
                 <label for="answer">Q :<div class="title"> {{$questions->title}} ?<p class="score"> ({{$questions->score}} Point)</p></div></label>
                @if($questions->type == 'text')
                    <input type="text" name="answer{{$questions->id}}"  class="form-control" placeholder="Your Answer">
                   </div>
                @else
                    <div class="radio">
                <?php $answers =  explode(',',$questions->answers); ?>
                      @foreach ($answers as $answer)
                     <label  class="checkbox"><input type="radio" name="answer{{$questions->id}}" value="{{$answer}}"/>
                         {{$answer}}</label><br>
                     @endforeach
                </div> <hr> 
                @endif
                @endforeach
             <input type="submit" class="btn btn-primary" >
            </form>
            </div>
        {{-- </div>
      </div> --}}
   </div>
  </div>
@endsection

