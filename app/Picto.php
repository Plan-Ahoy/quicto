<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picto extends Model
{
   	
   	protected $fillable = [ 'title', 'full', 'thumb', 'library' ];

   	
   	/**
   	 * A Picto has many tags:
   	 * 
   	 * @return hasMany
   	 */
	public function tags(){
		$this->hasMany( 'App\Tag' );
	}

}
