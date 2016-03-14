@extends('template')

	@section('content')
	
			<h2>Your Details</h2>
			
			<h4>Username</h4>
			<p data-editable="username"data-url="{{url('users/'.$user->id)}}">{{$user->username}}</p>
			
			<h4>First Name</h4>
			<p data-editable="firstname" data-url="{{url('users/'.$user->id)}}">{{$user->firstname}}</p>
			
			<h4>Last Name</h4>
			<p data-editable="lastname" data-url="{{url('users/'.$user->id)}}">{{$user->lastname}}</p>
			
			<h4>Email</h4>
			<p data-editable="email" data-url="{{url('users/'.$user->id)}}">{{$user->email}}</p>
			
			<div id="token">{{csrf_token()}}</div>
			
@stop