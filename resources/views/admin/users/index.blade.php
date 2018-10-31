@extends('layouts.app')

@section('title','List of Users')

@section('content')
<center>
<div class="col-lg-12 col-lg-offset-12">
<h1>Users</h1>
<a href="./users/create" class="btn btn-info">Add New</a>
@if(Session::has('deleted_user'))
<p class="btn-danger">{{session('deleted_user')}}</p>

@endif
@if(Session::has('updated_user'))
<p class="btn-info">{{session('updated_user')}}</p>

@endif
<table class="table table-hover"  >
						<thead>
							<tr>
								 
								<th>ID</th>
								<th>Picture</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Is Active</th>
								<th>Created</th>
								<th>Updated</th>
								<th align="pull-right">Action</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
					</div></center>
					 

@stop