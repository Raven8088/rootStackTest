<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classified extends Model
{
    protected $fillable=[
   		'id',
		'category_id',
		'tittle',
		'body',
		'img'
		];


	public function category()
 	{
 			return $this->belongsTo(\App\Model\Category::class);
 	} 
}
