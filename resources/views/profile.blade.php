@extends('layouts.user_layout')

@section('content')

<div class="container">
    <div class="user-profile">
        <h3>Haloo <span class="name-user">{{$user->name}}</span></h3>
        <div class="row">
            <div class="col-sm-4">
               <div class="user-info">
                        <div class="user-image">
                          <p id="message"></p>
                            <div id="uploaded_image">
                              @if($user->photo)
                              <img src="/images/{{$user->photo->filename }}" class="avatar img-fluid img-thumbnail ">
                              @else
                              <img src="/images/default.jpg"  class="avatar img-fluid img-thumbnail ">
                              @endif
                            </div>

                              <div class="upload">
                                  <a href="" id="upload_btn" class="btn btn-primary upload "><i class="fas fa-cloud-upload-alt"></i> Upload</a>

                              </div>

                                  <form action="/profile" method="POST" enctype="multipart/form-data" id="form">
                                    @csrf
                                      <input type="file" name="image"    id="image_file" >

                                  </form>

                        </div>
                        <div class="user-data">
                            <ul class="list-unstyled">
                               {{-- <li><i class="fa fa-envelope" aria-hidden="true"></i> --}}
                              Email : {{ $user->email}}</li>
                              {{-- <img src="https://img.icons8.com/wired/64/000000/admin-settings-male.png" style="width: 9%"/>  --}}
                               <li style="color: #1c5996">  <i class="fas fa-user-shield"></i> :  {{ $user->admin == 1 ? 'Admin' : 'User'}} </li>
                               <li>  {{ $user->score}}  : Point</li>
                               <li style="font-weight: bold" class="{{ $user->email_verified_at ? 'text-success' : 'text-danger' }}" >{{ $user->email_verified_at ? 'Verified' : 'Unverified'}}</li>
                               <li> Member_at : <span style="margin-left:20px"> {{ $user->created_at->diffForHumans()}}</span> </li>
                            </ul>
                       </div>
                </div>
            </div>
            <div>

            </div>
            <div class="col-sm main">
              <h4>User Info</h4>
                <form action="" method="POST" enctype="multipart/form-data" style="margin-top: 18px">
                    @csrf
                    <div class="form-group">
                      <label for="InputUser">User Name</label>
                      <input type="text" name="username" value="{{$user->name}}" class="form-control" id="InputUser" aria-describedby="emailHelp" placeholder="Enter User ">
                    </div>
                    <div class="form-group">
                      <label for="InputEmail1">Email address</label>
                      <input type="email" name="email" value="{{$user->email}}" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="InputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
                    </div>

                      <div class="form-group">
                        <label for="ConfirmPassword1">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" id="ConfirmPassword1" placeholder="Password">
                      </div>



                    <button type="submit" class="btn btn-primary" value="save" style="margin-top: 18px;padding-right:40px;padding-left:40px;">Save</button>
                  </form>
            </div>
        </div>
  </div>
</div>
@endsection
