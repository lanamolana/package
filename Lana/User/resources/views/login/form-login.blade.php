@extends("LanaTemplate::one-column")

@section("header")
    <h1>Demo Package</h1>
@stop

@section("content")

<h2>Form Login</h2>

<hr>

<form action="{{ url('/proses-login') }}" method="post" class="form-horizontal">
    
     <div class="form-group">
        <label for="username" class="control-label col-xs-1">Username</label>
        <div class="col-xs-3">
    <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
    </div>
    
    <div class="form-group">
        <label for="password" class="control-label col-xs-1">Password</label>
        <div class="col-xs-3">
    <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <hr>
    <div class="form-group">
        <div class="col-xs-offset-1 col-xs-10">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>
</form>

@stop

@section("footer")
    Copyright &copy; {{ date("Y") }} by Slamet Maulana Yusuf. All Right Reserved.
@stop