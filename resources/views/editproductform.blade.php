@extends('template')

	@section('content')
	
			<h2>Edit Product</h2>
			
			{{ Form::model($product,array('url' => 'products/'.$product->id,'method'=>'put')) }}
			
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
					{{Form::select('type_id', \App\Models\Type::lists('name','id'))}}
					{!!$errors->first('type_id','<p class="error">:message</p>')!!}
					
					<input type="reset" value="Reset">
					<input type="submit" value="Submit">
				</fielset>
			</form>
			{{ Form::close()}}
				
@stop