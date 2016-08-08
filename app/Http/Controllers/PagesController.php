<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\Picto;
use Illuminate\Http\Request;
use App\Http\Requests;

class PagesController extends Controller
{
    

    /**
     * Serve the page, 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function welcome( Request $request ){

    	$pictos = array();

    	if( isset( $request->search ) )
            $pictos = $this->getSearchResults( $request );
    	
    	return view( 'pages.welcome', compact( 'pictos' ) );

    }


    /**
     * Returns an array of Picto objects after you've searched
     *
     * @param Request $request
     * 
     * @return array
     */
    public function getSearchResults( $request ){

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
            return Picto::findMany( $results );

        return array();
    }



    /**
     * Import image-files as Picto models
     * 
     * @return array
     */
    public function makePictos(){

        $basedir = public_path().'/pictos';
        $dir = '/01-abstract/';
        $paths = glob( $basedir.$dir.'*' );

        $pictos = array();
        foreach( $paths as $path ){

            $file = str_replace( $basedir.$dir, '', $path );
            $full = str_replace( public_path().'/', '', $path );
            $thumb = str_replace( $file, 'tn-'.$file, $full );

            $arr = array(
                'title'     => $this->makeName( $file ),
                'full'      => $full,
                'thumb'     => $thumb,
                'library'   => 'sclera'
            );

            $picto = new Picto( $arr );
            $pictos[] = $picto;
            $picto->save();
        }



        return $pictos;
    }

    /**
     * Generate a name out of a filename
     * 
     * @param  string $fileName
     * @return string $name
     */
    public function makeName( $fileName ){
        
        $extensions = array( '.jpg', '.png', '.gif', '.bmp' );

        $name = str_replace( $extensions, '', $fileName );
        $name = str_replace( '-', ' ', $name );
        $name = ucwords( $name );
        return $name;
    }


}
