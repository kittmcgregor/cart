<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

	$type = App\Models\Type::find(3);
	//['type'=>$type]
	return view('productlist',compact('type'));

/*
	$order = App\Models\Order::find(1);
	return $order->products;
*/
	
/*
	$type = App\Models\Type::find(1);
	
	return $type->products;
*/

/*
	$user = App\Models\User::find(1);
	
	return $user->orders;
*/
	
	
/*
	$product = App\Models\User::find(3);
	return $product->type;
*/
	
	
	//return view('productlist');
	
	
    //return view('welcome');
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
    Route::get('types/{id}', function($id){
	$type = App\Models\Type::find($id);
			// 'productlist',['type'=>$type]
	return view('productlist',compact('type'));
	});
	
	// Users
	
	Route::get('users/create', function(){
		return view('registerform');
	});
		
		// To view
		Route::get('users/{id}', function($id){
			$user = App\Models\User::find($id);
					// 'userdetails',['type'=>$type]
			return view('userdetails',['user'=>$user]);
		});
	
		Route::post('users', function(App\Http\Requests\CreateUserRequest $req){
			$user = App\Models\User::create(Request::all());
			return redirect('users/'.$user->id);
		});
	
	Route::get('users/{id}/edit', function($id){
		$user = App\Models\User::find($id);
		return view('edituserform',['user'=>$user]);
	});
	
		Route::put('users/{id}', function(App\Http\Requests\EditUserRequest $req, $id){
			$user = App\Models\User::find($id);
			$user->fill(Request::all());
			$user->save();
			return redirect('users/'.$id);
		});
	
	// Products
	
	Route::get('products/create', function(){
		return view('createproductform');
	});
	
		Route::post('products', function(App\Http\Requests\CreateProductRequest $req){
			$product = App\Models\Product::create(Request::all());
			return redirect('types/'.$product->type_id);
		});
	
	Route::get('products/{id}/edit', function($id){
		$product = App\Models\Product::find($id);
		return view('editproductform',['product'=>$product]);
	});
	
		Route::put('products/{id}', function(App\Http\Requests\EditProductRequest $req, $id){
			$product = App\Models\Product::find($id);
			$product->fill(Request::all());
			$product->save();
			return redirect('types/'.$product->type_id);
		});
	
});
