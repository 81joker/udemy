@extends('layouts.user_layout')

@section('content')

<div class="container"> 
    <div class="user-profile">
        <h3>{{$user->name}}</h3>
        <div class="row">
            <div class="col-sm-4">
               <div class="user-info">
                        <div class="user-imge">
                            @if($user->photo)
                            <img src="/images/{{$user->photo->filename }}" class="avatar img-fluid img-thumbnail ">
                            @else
                            <img src="/images/default.jpg"  class="avatar img-fluid img-thumbnail ">
                            @endif

                            <a href="#" class="btn btn-primary"><i class="fas fa-cloud-upload-alt"></i>Upload</a>

                            <form action="/profile" method="POST" enctype="multipart/form-data">
                                <input type="file" name="image">

                            </form>

                        </div>
                        <div class="user-data"> 
                            <ul class="list-unstyled">
                               <li><i class="fa fa-envelope" aria-hidden="true"></i>
                               : {{ $user->email}}</li>
                               <li><img src="https://img.icons8.com/wired/64/000000/admin-settings-male.png" style="width: 9%"/> : {{ $user->admin == 1 ? 'Admin' : 'User'}} </li>
                               <li><i class="fa fa-ellipsis-v" aria-hidden="true"></i> :{{ $user->score}} Point</li>
                               <li>{{ $user->email}}</li>
                            </ul>     
                       </div>
                </div>
            </div>
            <div>
           
            </div>
            <div class="col-sm main">
                <h1>haol.</h1>
            </div>
        </div>
  </div> 
</div>
@endsection
