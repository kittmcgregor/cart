<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'photo', 'type_id' 
    ];
    
    
    //
    public function type(){
	    return $this->belongsTo("App\Models\Type");
	    }
    public function orders(){
	    return $this->belongsToMany("App\Models\Order");
	    } 
}
