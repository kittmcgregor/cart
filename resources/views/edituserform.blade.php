@extends('template')

	@section('content')
	
			<h2>Update Your Account</h2>
			
			{{ Form::model($user,array('url'=>'users/'.$user->id,'method'=>'put')) }}
<!--
	Manual method
			{{ Form::open(array('url' => 'users')) }}
			{{Form::text('username',$user->username)}}
-->
			
			
			<form action="">
				<fielset>
				
					<label for="">Username.</label>
					{{Form::text('username')}}
					{!!$errors->first('username','<p class="error">:message</p>')!!}
					
					<label for="">Email.</label>
					{{Form::text('email')}}
					{!!$errors->first('email','<p class="error">:message</p>')!!}
					
					<label for="">Firstname.</label>
					{{Form::text('firstname')}}
					{!!$errors->first('firstname','<p class="error">:message</p>')!!}
					
					<label for="">Lastname.</label>
					{{Form::text('lastname')}}
					{!!$errors->first('lastname','<p class="error">:message</p>')!!}
					
					<input type="reset" value="Reset">
					<input type="submit" value="Submit">
				</fielset>
			</form>
			{{ Form::close()}}
				
@stop