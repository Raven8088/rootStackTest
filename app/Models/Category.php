<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable=[
   		'id',
		'category'
		];


		public function notices()
 	{
 			return $this->hasMany(\App\Models\subCategory::class);
 	}
}
