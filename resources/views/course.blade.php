@extends('layouts.user_layout')


@section('content')
<div class="container">
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

     <div class="col-sm-8">
        @if($course->photo)
        <img src="/images/{{ $course->photo->filename }}" width="250px">
        @else
        <img src="/images/default.jpg" width="250px">
        @endif
    </div>

    </div>
</div>
@endsection

