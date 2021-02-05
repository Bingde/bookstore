<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SongResource;
use App\Http\Resources\SongsCollection;
use App\Song;
class SongController extends Controller
{
    
   public function index()	{
	   
	   $data = new SongsCollection(Song::all());
	   
	   return $data;
    }
    
    public function single($song){
	    
	   //var_dump($song);
	    
	   $data = new SongResource(Song::find($song));
	   return $data;
    }
}
/*
  $data = Song::all()->toJson();
  var_dump($data);
  dd($data);
  return (Song::all());
  
*/
//return  SongResource::collection(Song::all());
   
 //return new SongsCollection(Song::all());