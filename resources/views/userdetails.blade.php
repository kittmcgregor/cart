@extends('template')

	@section('content')
	
			<h2>Your Details</h2>
			
			<h4>Username</h4>
			<p>{{$user->username}}</p>
			
			
			<h4>First Name</h4>
			<p>{{$user->firstname}}</p>
			
			<h4>Last Name</h4>
			<p>{{$user->lastname}}</p>
			
			<h4>Email</h4>
			<p>{{$user->email}}</p>
			
@stop