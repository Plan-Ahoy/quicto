<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
	public function pictos(){

		$this->belongsTo('App\Picto');

	}


}
