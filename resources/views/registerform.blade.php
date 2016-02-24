@extends('template')

	@section('content')
	
			<h2>Register My Account</h2>
			
			{{ Form::open(array('url' => 'users')) }}
			
			<form action="">
				<fielset>
				
					<label for="">Username.</label>
					{{Form::text('username')}}
					{!!$errors->first('username','<p class="error">:message</p>')!!}
					
					<label for="">Email.</label>
					{{Form::text('email')}}
					{!!$errors->first('email','<p class="error">:message</p>')!!}
					
					<label for="">Password.</label>
					{{Form::text('password')}}
					{!!$errors->first('password','<p class="error">:message</p>')!!}
										
					<label for="">Confirm Password.</label>
					{{Form::text('password_confirmation')}}
					{!!$errors->first('password_confirmation','<p class="error">:message</p>')!!}
					
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