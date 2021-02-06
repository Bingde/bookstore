<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SongResource;
use App\Http\Resources\SongsCollection;
use App\Song;
class SongController extends Controller
{
    
   public function index()	{
	   //the the number of songs from the song model
	  $count = Song::all()->count();
/*
	  $data = new SongsCollection(Song::all());
	  $meta = $data->toJson();
	  dd($meta);
*/
	  // get the collections of the songs 	  
	  $data = (new SongsCollection(Song::paginate(5)))->additional(['meta' => [
      'count' => $count,]]);
	  
     // Verify the additional variable be passed in the object	  
	  $count1 = data_get($data, 'additional.meta.count'); //10
	  //dd($count1);
	  
      return view('songs', ['datas' => $data,'numbersong' => $count]);
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