<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picto extends Model
{
   	
   	/**
   	 * A Picto has many tags:
   	 * 
   	 * @return hasMany
   	 */
	public function tags(){
		$this->hasMany( 'App\Tag' );
	}

}
