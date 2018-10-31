@extends('layouts.app')

@section('title','Create New User')

@section('content')

<center>
  
<div class="col-lg-4 col-lg-offset-4"><h1>Create New User</h1>

@if(count($errors))
<div class="alert alert-danger">
@foreach($errors->all() as $error)

{{$error}}
@endforeach
</div>
@endif
</div></center>
@endsection