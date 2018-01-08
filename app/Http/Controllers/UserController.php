<?php

namespace App\Http\Controllers;

use App\user;
use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class UserController extends Controller 
{
    /*Return views*/
    public function login_view()
    {
        return view('welcome_login');
    }
    public function Home_view()
    {
        if(Auth::check()){ 
        $user = Auth::user();
         
        $post = DB::table('posts')->where('user_id',"=",$user->id)->get();
        
        return view('home',[
            'users'=> $user,
            'post'=>$post
            ]);
        }else
        {
            return redirect()->route('login_view');
        }
    }
    
    public function Explore_view()
    {
        if(Auth::check()){
        $post = posts::all();
        return view('explore',[
            'post'=>$post
        ]);
        }else
        {
            return redirect()->route("login_view");
        }
    }
    
    public function Profile_view($id)
    {
        if(Auth::check()){
        $user = DB::table('users')->where('id',$id)->first();
        $post = DB::table('posts')->where('user_id',"=",$id)->get();
        
        return view('view_profile',[
            'users'=> $user,
            'posts'=>$post
            ]);
        } else 
        {
            return redirect()->route('login_view');    
        }
    }
    
    public function delete($id)
   {
        if(Auth::check()){
        $post = DB::table('posts')->where('id',"=",$id)->delete();
        $message = "Succesfully deleted";
        return redirect()->back()->with('succes_message',$message);
        
        }else
        {
            return redirect()->route('login_view');
        }
        
    }

        public function Logout()
    {
        \Auth::logout();
        return redirect()->route('welcome')->with('succes_message','Succesfully Logged Out');
    }


    /*User function*/
    public  function register_user(Request $post)
    {
        $this->validate($post,[
            'email' => 'email|required|unique:users',
            'fullname'=>'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);
        
        $email = $post['email'];
        $fullname = $post['fullname'];
        $username = $post['username'];
        $password = bcrypt($post['password']);
        
        $user = new user();
        
        $user->email = $email;
        $user->fullname = $fullname;
        $user->username = $username;
        $user->password = $password;
        $message = 'Unsuccesfull registration';
        if($user->save())
        {   
        $message = 'Succesfully registered';
         return redirect()->route('login_view')->with(['succes_message' => $message]);
        }
       
        
    }
    public function login(Request $post)
    {
        $this->validate($post,[
           'email'=>'required',
           'password'=>'required'
        ]);
        
        if(Auth::attempt(['email'=>$post['email'],'password'=>$post['password']]))
        {
            return redirect()->route('Home_view');
        }else
        {
            $message="Incorrect password/email please try again";
            return redirect()->route('welcome')->with(['error_message' => $message]);
        }
    }
    
    public function update_user(Request $post)
    {
       $user = Auth::user();
       
       $user->email = $post['email'];
       $user->username = $post['username'];
       
       $user->update();
       return redirect()->route('Home_view')->with('succes_message','Update Successful');  
    }
    
    public function update_image(Request $post)
    {
        
        $this->validate($post,[
           'profile_img'=>'required|mimes:jpeg,jpg,png'
        ]);
        
        if($post->hasFile('profile_img'))
        {
            $user = Auth::user();
            $name = $user->id;
            
            
             if(file_exists(public_path() . '/uploads/profiles/'.$name))
            {
                File::delete(public_path() . '/images/profile/'.$user->file->name);
            }
            $profile_img = $post->file('profile_img');
            $filename = $name.'.'.$profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300,300)->save(public_path('/uploads/profiles/'.$filename));
            
           
            $user->avator = $filename;
            $user->update();
           
        }  
         return redirect()->route('Home_view');
    }
    
    
    
}
