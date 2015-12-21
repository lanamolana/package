@extends('LanaTemplate::one-column')

@section("header")
    <h1>Demo Package</h1>
@stop

@section("content")
<div class="container">
<div class="col-md-6">
<h2>Daftar User</h2>
<br>
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<th>No</th>
		<th>Name</th>
		<th>Username</th>
		<th>Password</th>
		<th>Action</th>

	</thead>
	@foreach($user as $index=>$user)
	<tr>
		<th>{{ $index+1 }}</th>
		<th>{{ $user->name }}</th>
		<th>{{ $user->username }}</th>
		<th>{{ $user->password }}</th>
		<th>
		<a href="{{ url("/user/$user->id/edit")}}">
		<button class="btn btn-success btn-sm">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"> Edit</span></button></a> |
		<a href="{{ url("/user/$user->id/delete")}}">
		<button class="btn btn-danger btn-sm">
		<span class="glyphicon glyphicon-trash" aria-hidden="true"> Delete</span></button></a>
	</tr>
	@endforeach
</table>
</div>
</div>
@stop

@section("footer")
    Copyright &copy; {{ date("Y") }} by Slamet Maulana Yusuf. All Right Reserved.
@stop