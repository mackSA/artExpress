@extends('layouts.master')

@section('content')
<div id="head">
    <div class="row">
    </div>
    <div class="row"style="text-align: center">
    <div class="col s12 m10 offset-m1 l10 offset-l1">    
        <nav>
            <div class="nav-wrapper  purple lighten-3">
                <ul id="nav-mobile" class="col s12">
                <li><a href="{{URL::route('Home_view')}}" class="  waves-effect waves-green btn-flat"style="border:1px solid black;"><i class="Medium material-icons">perm_identity</i> </a></li>
                  
              </ul>
            </div>
        </nav>
    </div>
</div>        
</div>
<div class="row">
    <div class="col s12 m10 offset-m1 l10 offset-l1">
        <a href="{{URL::route('Logout')}}" class="waves-effect right waves-purple btn-flat"style="border:1px solid black;"><p style="font-family: 'Dancing Script', cursive;">Logout</p></a>  
    </div>
</div>
<div class="container-fluid"> 
    <div class="row">
    @foreach($post as $post)
        <div class="col s12 m4 l3">
            <div class="card">
                <div class="card-image">
                    <img src="/uploads/uploads/{{$post->post}}">
                    <a href="{{URL('Profile/'.$post->user_id)}}" class="btn-floating halfway-fab waves-effect waves-purple pink"><i class="material-icons">visibility</i></a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>  
@endsection