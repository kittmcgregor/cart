@extends('template')

	@section('content')
	
			<h2>Register My Account</h2>
			
			{!! Form::open(array('url' => 'users/create')) !!}
			
			<form action="">
				<fielset>
					<label for="">Email.</label>
					<input type="text" name="" id="">
					<label for="">Password.</label>
					<input type="password" name="" id="">
					<label for="">Confirm Password.</label>
					<input type="password" name="" id="">
					<label for="">Firstname.</label>
					<input type="text" name="" id="">
					<label for="">Lastname.</label>
					<input type="text" name="" id="">
					<input type="reset" value="Reset">
					<input type="submit" value="Login">
				</fielset>
			</form>

@stop