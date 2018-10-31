@extends('layouts.app')



@section('content')
 
<h1>Edit User Profile </h1>
<div class="col-sm-3">
<img src="{{$user->photo ? $user->photo->file : 'http://placeholder.it/400x400.jpg'}}"  height="90" width="100" alt="" class="img-resposive img-rounded">
  </div>
   <p>
<form  class="form-horizontal" method="post" action="/admin/users/{{$user->id}}">
	{{csrf_field()}}
	<fieldset>
   <div class="form-group">
      <div class="col-lg-10">
	<input type="hidden" name="_method" value="PUT">
	<div class="form-group">
     
      <div class="col-lg-10">
<input type="text"  class="form-control" name="name" placeholder="Enter name" value="{{$user->name}}">
<br>
   <input type="text"  class="form-control" name="email" placeholder="Enter email" value="{{$user->email}}">
     <br>
     <div class="form-group">
       <div class="col-lg-10">
      <input type="file" class="form-control" id="photo_id" placeholder="Upload Picture" name="photo_id">
    </div>
    <br>
       <div class="form-group">
     <div class="col-lg-10">
      <select class="form-control" id="role" name="role_id">
        <option>Select Role</option>
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
        
      </select>
    </div>
    <br>
    <div class="form-group">
     <div class="col-lg-10">
      <select class="form-control" id="is_active" name="is_active">
        <option>Select Status</option>
        <option  value="0">Not Active</option>
        <option value="1">Active</option>
        
      </select>
    </div>
   <br>
	<input type="submit" name="submit" value="UPDATE" class="btn btn-success">&nbsp;<a href="/admin/users" class="btn btn-info">Back</a> 

</form>

 
 
 
@endsection