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
	  //$data = Song::paginate(3);
 
	  $data = (new SongsCollection(Song::paginate(5)))->additional(['meta' => [
      'count' => $count,]]);
      
      return view('songs', ['datas' => $data,'numbersong' => $count]);
    }
    
    public function single($song){
	    
	   //var_dump($song);
	    
	   $data = new SongResource(Song::find($song));
	   return $data;
    }
     public function store(Request $request)
    {
        $book = new Song();
        $book->title = $request['title'];
        $book->artist = $request['artist'];
        $book->rating = $request['rating'];
        $book->album_id = $request['album_id'];
        
        $result=  $book->save();
        $count = Song::all()->count(); 
        $data = (new SongsCollection(Song::paginate(5)))->additional(['meta' => [ 'count' => $count]]);

      
        return view('songs', ['datas' => $data,'numbersong' => $count]);
    }

    
}
