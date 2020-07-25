<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');


    }
    public function index(){
        $user = auth()->user();
    return view('profile' , compact('user'));
    }
    public function update_image(Request $requeest){
        $user = auth()->user();
        $photoable_type = 'App\User';
        $photoable_id   = $user->id;
        if($image = $requeest->file('image')){
            $file_to_store = time() . '_' . $user->name . '_' .$image->getClientOrginalExtenstion();

            if($user->photo()->create(['filename'=>$file_to_store , 'photoable_id'=>$photoable_id, 'photoable_type'=> $photoable_type ])){
                $image->move(publi_path('images') , $file_to_store );

            }
            // return redirect('/profile')->WithStatus('is uploeded');
            return response()->json([
                'message' => 'Your profile image successfully uploaded',
                'uploaded_image' => '<img src="/images/'.$file_to_store.'"  class="img-fluid img-thumbnail ">',
            ]);

        }
    }


    public function avtar(){
        return view('avtar', ['user' => Auth::user()] );
    }
}
