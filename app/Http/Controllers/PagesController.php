<?php

namespace App\Http\Controllers;

use DB;
use App\Picto;
use Illuminate\Http\Request;
use App\Http\Requests;

class PagesController extends Controller
{
    

    public function welcome( Request $request ){


    	$pictos = array();

    	if( isset( $request->search ) ){

    		$searchTerm = '%'.$request->search.'%';

    		//get the IDs:
    		$results = DB::table( 'pictos' )
    				   ->distinct()
    				   ->leftJoin( 'tags', 'pictos.id', '=', 'tags.picto_id' )
    				   ->where( 'tags.name', 'like', $searchTerm )
    				   ->orWhere( 'pictos.title', 'like', $searchTerm )
    				   ->pluck('pictos.id');
		
			//fetch the picto's in neat little models:
    		if( !empty( $results ) )
    			$pictos = Picto::findMany( $results );
    	}
    	
    	return view( 'pages.welcome', compact( 'pictos' ) );

    }
}
