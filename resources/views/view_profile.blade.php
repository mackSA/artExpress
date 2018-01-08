@extends('layouts.master')

@section('content')
<div id="head">
    <div class="row">
        <div class="col s10 offset-s1 m4 offset-m2 l2 offset-l4">
            <img class="responsive-img circle" src="/uploads/profiles/{{$users->avator}}">
            @if($users->id == Auth::user()->id)
            <a href="#upload_image" class="waves-effect waves-purple btn-flat"style=" margin-left: 55px;">Update picture</a>
            @endif
              <!--edit image modal-->
            <div id="upload_image" class="modal">
                    <form action="{{route('update_image')}}" method="POST" enctype="multipart/form-data" class="col s10" style="padding-bottom: 20px">
                <div class="row">
                  <div class="input-field col s12">
                      <h5 style="font-family: 'Dancing Script', cursive;">Upload image:</h5>
                      <input id="image" name="profile_img"  type="file" class="validate">
                    
                  </div>
                </div>
                <input type="hidden" value="{{Session::token()}}" name="_token">
        
                    <a href="#!" class="left modal-action modal-close waves-effect waves-red btn-flat" style="border: 1px red solid;margin:20px;">Cancel</a>
                    
                    <button type="submit" name="update" class=" waves-effect waves-green btn-flat" style="border: 1px green solid;margin:20px;">Save</button>
                
                 </form> 
            </div>
            <!--end of modal-->
        </div>
        <div class="col s10 offset-s2 m6 l5" style="margin-top: 20px;">
            <h3 style="font-family: 'Dancing Script', cursive;">{{$users->username}}</h3>
              @if($users->id == Auth::user()->id)
            <a href="#Edit_profile" class="waves-effect waves-purple btn-flat"style="border:1px solid black">Edit Profile</a>
            @endif
          
              <!--edit profile modal-->
            <div id="Edit_profile" class="modal">
               <form action="{{route('update')}}" method="POST" class="col s10" style="padding-bottom: 20px">
                <div class="row">
                  <div class="input-field col s12">
                      <input id="email" name="email"  type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username" name="username" type="text" class="validate">
                    <label for="username">Username</label>
                  </div>
                </div>          
                 <input type="hidden" value="{{Session::token()}}" name="_token">
        
                    <a href="#!" class="left modal-action modal-close waves-effect waves-red btn-flat" style="border: 1px red solid;margin: 20px;">Cancel</a>
                    
                    <button type="submit" name="update" class=" waves-effect waves-green btn-flat" style="border: 1px green solid;margin: 20px;">Save</button>
                
                 </form>
            </div>
            <!--end of modal-->
            <h5 style="font-family: 'Dancing Script', cursive;">{{$users->fullname}}</h5>
        </div>
    </div>
    <div class="row"style="text-align: center">
    <div class="col s12 m10 offset-m1 l10 offset-l1">    
        <nav>
            <div class="nav-wrapper light-green lighten-3">
                <ul id="nav-mobile" class="col s12">
                    <li><a href="{{URL::route('Home_view')}}" class="waves-effect waves-purple btn-flat"style="border:1px solid black;"><i class="Medium material-icons">assignment_ind</i> </a></li>
                <li><a  href="{{URL::route('Explore_view')}}" class="waves-effect waves-purple btn-flat"style="border:1px solid black;"><i class="Medium material-icons">visibility</i></a></li>  
              </ul>
            </div>
        </nav>
    </div>
</div>        
</div>
<div class="row">
    <div class="col s12 m10 offset-m1 l10 offset-l1">
        @include('includes.messages')
        @if(Auth::user()->id == $users->id)
        <a href="#Post" class="waves-effect waves-purple btn-flat"style="border:1px solid black;"><p style="font-family: 'Dancing Script', cursive;">Post image</p></a>
        @endif    
        <!--edit profile modal-->
           <div id="Post" class="modal">
               <form action="{{route('upload_post')}}" method="POST"  enctype="multipart/form-data" class="col s10" style="padding-bottom: 20px">
                <div class="row"
                    <div class="input-field col s12">
                      <h5 style="font-family: 'Dancing Script', cursive;">Upload image:</h5>
                      <input id="image" name="upload"  type="file" class="validate">
                    </div>
                      <input type="hidden" value="{{Session::token()}}" name="_token">
                    <a href="#!" class="left modal-action modal-close waves-effect waves-red btn-flat" style="border: 1px red solid;margin: 10px;">Cancel</a>
            
                    <button type="submit" name="update" class=" waves-effect waves-green btn-flat" style="border: 1px green solid;margin:10px;">Save</button>    
                 </form>  
            </div>
            <!--end of modal-->
        <a href="{{URL::route('Logout')}}" class="waves-effect right waves-purple btn-flat"style="border:1px solid black;"><p style="font-family: 'Dancing Script', cursive;">Logout</p></a>
    </div>
</div>
<div class="container-fluid"> 
    <div class="row">
    @foreach($posts as $post)
        <div class="col s12 m4 l3">
            <div class="card">
                <div class="card-image">
                    <img src="/uploads/uploads/{{$post->post}}">
                    @if(Auth::user()->id == $post->user_id)
                    <a href="{{URL('delete/'.$post->id)}}"class="btn-floating halfway-fab waves-effect waves-light-green-lighten-3"><i class="material-icons">delete</i></a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>    
@endsection


