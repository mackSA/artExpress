<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostsController extends Controller 
{
    
    public function upload_Post(Request $post)
    {
        
        $this->validate($post,[
           'upload'=>'required|mimes:jpeg,jpg,png'
        ]);
        
        
        if($post->hasFile('upload'))
        {
            $user = Auth::user();
            $id = $user->id;
            
            $profile_img = $post->file('upload');
            $filename = time().'.'.$profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300,300)->save(public_path('/uploads/uploads/'.$filename));
            
            $upload = new posts();
            $upload->post = $filename;
            $upload->user_id= $id;
            $upload->save();
           
        }  
         return redirect()->route('Home_view');
    }
    
    
    
    
}

