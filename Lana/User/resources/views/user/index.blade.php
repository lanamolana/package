@extends('LanaTemplate::one-column')

@section("content")

<div class="container">
<div class="col-md-6">
<h2>Daftar User</h2>
<br>
<br>
<a href="/user/register">
<button class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah</span></button></a>
<br>
<br>
<table class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Action</th>

	</thead>
	@foreach($user as $index=>$user)
	<tr>
		<th>{{ $index+1 }}</th>
		<th>{{ $user->username }}</th>
		<th>{{ $user->password }}</th>
		<th>{{ $user->level }}</th>
		<th>
		<a href="{{ url("/user/$user->id/edit")}}"><button class="btn btn-success btn-sm">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"> Ubah</span></button></a>
		<a href="{{ url("/user/$user->id/delete")}}"><button class="btn btn-danger btn-sm">
		<span class="glyphicon glyphicon-trash" aria-hidden="true"> Hapus</span></button></a>

	</tr>
	@endforeach
</table>
</div>
</div>
@stop