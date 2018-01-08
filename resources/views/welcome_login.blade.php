@extends('layouts.master')

@section('content')
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center" style="font-family: 'Dancing Script', cursive;">ART EXPRESS</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{URL::route('welcome')}}">Register</a></li>
      </ul>
       <ul class="side-nav" id="mobile-demo">
        <li><a href="{{URL::route('welcome')}}">Register</a></li>
        
      </ul>
    </div>
</nav>
<div class="row">
    <div class="col s12 m8 offset-m2 l6 offset-l3 ">
        <div id="header">
            <h1 class="black-text">ART EXPRESS<span><img src="{{URL::to('images/art_brush_2.png')}}"></span></h1>
        </div>
    </div>
</div> 
 <div id="content">    
    <div class="row">
        <div class="col m4 push-m2 l2 push-l2 hide-on-med-and-down ">
            <div id="App_ad">
                <img src="/images/iphone1.jpg">
                <h5>App coming soon!!</h5>
                <img src="/images/appstoreicons.png">
            </div>
        </div>
        <div class="col s12 m4 push-m2 l4 push-l4 ">
             @include('includes.messages')
            <div class="row"> 
              
                    <form action="{{route('login')}}" method="POST" class="col s12 z-depth-5" style="padding-bottom: 20px">
                <div class="row">
                  <div class="input-field col s12">
                      <input id="email" name="email"  type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                  </div>
                </div> 
                 <input type="hidden" value="{{Session::token()}}" name="_token">
                <button class="btn waves-effect waves-light" type="submit" name="sign_up">Login
                    <i class="material-icons right">send</i>
                </button>   
                </form>  
            </div>
            <div class="row">
                <div class="z-depth-5 " style="text-align: center;padding: 15px;">
                
                    <h6>Don't have an Account? <a href="{{route('welcome')}}">Register</a></h6>  
                </div>
            </div>      
        </div>
    </div>     
<footer class="page-footer" style="margin-top: 70px;">
    <div class="footer-copyright">
        <div class="container">
            © 2017 mackmorerwa 
        </div>
    </div>
</footer>         
@endsection
