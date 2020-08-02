<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\ImageUser;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    //
    //function to get data for edit
    public function updateprofile(){
        $user = Auth::user();
        if($user){
         	return view('updateprofile');
        }else{
        	return redirect('/');
        }
    }
    //function to update data
    public function update(ProfileRequest $request){
    	$user = Auth::user();
    	if($user){
             $data = $request->all();
             if($file = $request->file('image_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $image = ImageUser::create(['image'=>$name]);
                $user->update([
                   'image_id'=>$image->id,
                   'name'=>$data['name'],
             	   'surname'=>$data['surname'],
             	   'username'=>$data['username'],
             	   'email'=>$data['email'],
             ]);
           }
           else{
                $user->update([
             	   'name'=>$data['name'],
             	   'surname'=>$data['surname'],
             	   'username'=>$data['username'],
             	   'email'=>$data['email'],
             ]);
           }
           Session::flash('flash_message', 'Your Profile has been updated!');
           return redirect()->back();
    	}
    	else {
    		return redirect('/');
    	}
    }

    // view password function
    public function change(){
        $user = Auth::user();
        if($user){
             return view('changepassword', compact('user')); 
         }
         else {
           	return redirect('/');
         }
    }
    //update password
    public function changepassword(ChangePasswordRequest $request){
    	    $hashedPassword = Auth::user()->password;
    	    if(Hash::check($request->oldpassword, $hashedPassword)){
    	    	$user = Auth::user();
    	    	$user->password = Hash::make($request->password);
    	    	$user->save();
    	    	Auth::logout();
    	    	Session::flash('flash_message', 'Your password is changed! Login with your new password');
                 return redirect('/');
    	    }
    	     Session::flash('flash_message', 'Your password is not changed!Try again!');
             return redirect()->back(); 
    }
}
