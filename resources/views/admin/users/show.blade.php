@extends('layouts.admin')


@section('content')
 

 	<h1 align="center">  <a href="{{route('admin.users.edit',$user->id)}}">{{$user->email}}</a></h1>
 
 




@endsection