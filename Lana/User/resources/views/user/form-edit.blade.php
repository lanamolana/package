@extends("LanaTemplate::one-column")

@section("header")
    <h1>Demo Package</h1>
@stop

@section("content")

<h2>Form Edit User</h2>

<hr>

<form action="{{ $url }}" method="post" class="form-horizontal">
    
     <div class="form-group">
        <label for="username" class="control-label col-xs-1">Name</label>
        <div class="col-xs-3">
    <input type="text" class="form-control" name="name" value="{{ $user->name}}" placeholder="Name">
        </div>
    </div>
    
    <div class="form-group">
        <label for="password" class="control-label col-xs-1">Username</label>
        <div class="col-xs-3">
    <input type="text" class="form-control" name="username" value="{{ $user->username}}" placeholder="Username">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="control-label col-xs-1">Password</label>
        <div class="col-xs-3">
    <input type="text" class="form-control" name="password" value="{{ $user->password}}">
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <hr>
    <div class="form-group">
        <div class="col-xs-offset-1 col-xs-10">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>


@stop

@section("footer")
    Copyright &copy; {{ date("Y") }} by Slamet Maulana Yusuf. All Right Reserved.
@stop