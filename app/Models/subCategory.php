<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    protected $fillable=[
    	'id',
		'category_id',
		'subcategory'
		
	];



	public function category()
 	{
 			return $this->belongsTo(\App\Models\Category::class);
 	} 
}
