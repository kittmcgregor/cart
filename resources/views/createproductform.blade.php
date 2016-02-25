@extends('template')

	@section('content')
	
			<h2>Create Product</h2>
			
			{{ Form::open(array('url' => 'products')) }}
			
			<form action="">
				<fielset>
				
					<label for="">Name.</label>
					{{Form::text('name')}}
					{!!$errors->first('name','<p class="error">:message</p>')!!}
					
					<label for="">Description.</label>
					{{Form::text('description')}}
					{!!$errors->first('description','<p class="error">:message</p>')!!}
					
					<label for="">Price.</label>
					{{Form::text('price')}}
					{!!$errors->first('price','<p class="error">:message</p>')!!}
										
					<label for="">Photo.</label>
					{{Form::text('photo')}}
					{!!$errors->first('photo','<p class="error">:message</p>')!!}
					
					<label for="">Type.</label>
					{{Form::text('type_id')}}
					{!!$errors->first('type_id','<p class="error">:message</p>')!!}
					
					<input type="reset" value="Reset">
					<input type="submit" value="Submit">
				</fielset>
			</form>
			{{ Form::close()}}
				
@stop