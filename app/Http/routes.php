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
	    sleep(1);
	$type = App\Models\Type::find($id);
			// 'productlist',['type'=>$type]
	return view('productlist',compact('type'));
	});
	
	// Users 
	
		// To Create
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
			
			$user->password = bcrypt($user->password);
			$user->save();
			return redirect('users/'.$user->id);
		});
	
	
		// To edit
	Route::get('users/{id}/edit', function($id){
		$user = App\Models\User::find($id);
		return view('edituserform',['user'=>$user]);
	})->middleware(['auth']);
	
		Route::put('users/{id}', function(App\Http\Requests\EditUserRequest $req, $id){
			$user = App\Models\User::find($id);
			$user->fill(Request::all());
			$user->save();
			return redirect('users/'.$id);
		});
	
	// login
	Route::get('login', "LoginController@showLoginForm");
	// validate
	Route::post('login', "LoginController@processLogin");
	// logout
	Route::get('logout', "LoginController@logout");
	
	//Products
	Route::resource('products', 'productController');
	
	// Cart
	Route::get('cart-items', function(){
		return view('showcart');
	});

	
	Route::post('cart-items', function(){
		
		$product = App\Models\Product::find(Request::input('product_id'));
		
		$items = array(
		    'id' => $product->id,
		    'name' => $product->name,
		    'price' => $product->price,
		    'quantity' => Request::input('quantity')
		);
		
		// Make the insert...
		Cart::insert($items);
		return redirect('cart-items');
		
	});
	
	// Remove item from cart
	Route::delete('cart-items/{identifier}', function($identifier){
		Cart::item($identifier)->remove();
		return redirect('cart-items');
	});
	
	
	// Checkout
	Route::post('orders', function(){
		$order = new App\Models\Order();
		$order->user_id = Auth::user()->id;
		$order->status = "Pending";
		$order->save();
		
		foreach(Cart::contents() as $item){
			$order->products()->attach($item->id,
			["quantity"=>$item->quantity]);
		}
		
		Cart::destroy();
		return redirect("types/1");
		
	})->middleware(['auth']);
	
	// Show Orders
	Route::get('cart-orders', function(){
		$orders = Auth::user()->orders;

		return view('showorders',['orders'=>$orders]);
	})->middleware(['auth']);
	
	
		
});
