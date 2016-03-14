@extends('template')

	@section('content')
	
			<h2>Login</h2>
			
			{{ Form::open(array('url' => 'login')) }}
			
			<form action="">
				<fielset>
					{{Form::label('username','Username')}}
					{{Form::text('username')}}
					{!!$errors->first('username','<p class="error">:message</p>')!!}

					{{Form::label('password','Password')}}
					{{Form::text('password')}}
					{!!$errors->first('password','<p class="error">:message</p>')!!}
										
					<input type="submit" value="Login">
				</fielset>
			</form>
			{{ Form::close()}}
			
			{{Session::get('message')}}
				
@stop