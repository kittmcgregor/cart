<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
	
		public function __construct(){
			$this->middleware('auth',['except'=>'show']);
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproductform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $req)
    {
	    $product = Product::create(\Request::all());
		
		$newName = "photo".$product->id."jpg";
		$file = \Request::file("photo");
		
		$file->move("productphotos",$newName);
		$product->photo = $newName;
		$product->save();
		
		return redirect('types/'.$product->type_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       	$product = Product::find($id);
		return view('showproduct',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
		return view('editproductform',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $req, $id)
    {
        	$product = Product::find($id);
			$product->fill(\Request::all());
			$product->save();
			return redirect('types/'.$product->type_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('types/'.$product->type_id);
        
    }
}
