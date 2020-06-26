@extends('layouts.user_layout')

@section('content')

<div class="container"> 
<div class="mycourses">
    <h4>Your Courses</h4>
    <div class="courses">
        <div class="row">		
        @foreach($user_mycourses as $course)
            <div class="col-sm-3">
                <div class="course">
                    @if($course->photo)
                        <a href="/course/{{$course->slug}}"><img src="/images/{{ $course->photo->filename }}"></a>
                    @else
                        <a href="/course/{{$course->slug}}"><img src="/images/default.jpg"></a>
                    @endif
                        <h6><a href="/course/{{$course->slug}}">{{\Str::limit($course->title, 50)}}</a></h6>
                        <span style="margin-left: 10px; font-weight: 500;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
                        <span style="margin-left: 50%">{{ count($course->users) }} users</span>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
</div>
@endsection
