<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    use SoftDeletes;
    protected $dates = ['deleted_at'];
     
     
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
