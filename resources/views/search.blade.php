@extends('layouts.user_layout')


@section('content')
<div class="container">
    <h2>{{count($courses)}} Courses your match</h2>
    <div class="search-courses">
        <div class="row">
            <div class="col-sm-8">
             @foreach ($courses as $course) 
              <div class="course">
                  <div class="row">
                      <div class="col-sm-4">
                            <div class="course-image">
                                @if($course->photo)
                                <a href="/course/{{$course->slug}}"><img  src="/images/{{ $course->photo->filename }}" ></a>
                            @else
                              <a href="/course/{{$course->slug}}"> <img href="/course/{{$course->slug}}" src="/images/default.jpg" ></a>
                            @endif
                            </div>  
                      </div>   
                      <div class="col-sm-8">
                        <div class="course-info">
                            <a href="/course/{{$course->slug}}"> <h6>{{\Str::limit($course->title, 30)}}</h6></a>
                            <p>{{ \Str::limit($course->description,100) }}</p>
                            <h6>Track :<a href="/tracks/{{$course->track->name}}"> {{ $course->track->name}}</a>
                                <span style="float: right">
                                        @if($course->status == 0)
                                        <span class="free-badge">Free</span>
                                        @else
                                        <span  class="paid-badge">PAID</span>
                                        @endif
                    
                                    <span>{{ count($course->users)}}</span>
                                    <span>Useres enrolled</span>
                                </span>
                            </h6>
                        </div>
                          
                    </div>               
                  </div>
              </div>    
             @endforeach 
            </div>
            <div class="col-sm-4">
                <div class="main">

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

