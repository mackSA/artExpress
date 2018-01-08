@if(count($errors)> 0)
<div class="alert alert-danger alert-dismissible">
    @foreach($errors->all() as $error)
    <ul>
        <li><p>{{$error}}</p></li> 
    </ul>
    @endforeach
</div>    
@endif    
@if(Session::has('succes_message'))
<div class="alert alert-success alert-dismissible" role="alert">   
    <h5>{{Session::get('succes_message')}}</h5>
</div>
@endif