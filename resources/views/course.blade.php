@extends('layouts.user_layout')


@section('content')
<div class="container">

  <div  style="margin-top: 15px;margin-bottom: -35px;">  
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  </div>

 <div class="course-header">
     <div class="row">
        <div class="col-sm-8">
            <h2>{{$course->title}}</h2>
            <p>{{$course->description}}</p>
            <h5>Track :<a href="/tracks/{{$course->track->name}}"> {{ $course->track->name}}</a>
                <span style="float: right">

                        @if($course->status == 0)
                        <span class="free-badge">Freee</span>
                        @else
                        <span  class="paid-badge">PAID</span>
                        @endif

                    <span>{{ count($course->users)}}</span>
                    <span>Useres enrolled</span>
                 </span>
           </h5>
        </div>
        <div class="col-sm">
            @if($course->photo)
            <img src="/images/{{ $course->photo->filename }}" width="250px">
            @else
            <img src="/images/default.jpg" width="250px">
            @endif
        </div>
     </div>
    </div>

   <div class="videos">
    <h3>Course Videos</h3>

        <div class="row">
            <div class="col-sm-12">
            @if(count($course->videos) > 0 )
                @foreach ($course->videos as $video)
                <div class="video">
                  <a href="{{$video->link}}" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fab fa-youtube"></i>
                    {{$video->link}}</a>
                </div>
                @endforeach
        
               
                @else
              <div class="alert alert-secondary">
                  This course does not include any video
              </div>
              @endif
          <div>
      </div>
   </div>
</div>
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
        <div class="container">
          <div class="quizzes">
              <h3>Course Quizzes</h3>
                  <div class="row">
                     <div class="col-xs-12">
                      @if(count($course->quizzes) > 0 )
                         @foreach ($course->quizzes as $quiz)
                          <div class="quiz">
                              <a href="/course/{{$course->slug}}/quizzes/{{$quiz->name}}" target="_blank">
                                  {{$quiz->name}}
                              </a>
                            </div>
                         @endforeach
                         @else
                                <div class="alert alert-secondary">
                                    This course does not include any Quizzes
                        </div>
                      @endif
                     </div>
                  </div>
          </div>
      </div>


    
    
   </div>
  </div>
@endsection

