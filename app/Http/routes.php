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
	
	Route::get('users/create', function(){
		return view('registerform');
	});
	
	Route::get('users/{id}', function($id){
		$user = App\Models\User::find($id);
				// 'userdetails',['type'=>$type]
		return view('userdetails',['user'=>$user]);
	});
	
	Route::post('users', function(App\Http\Requests\CreateUserRequest $req){
		$user = App\Models\User::create(Request::all());
	});
});
