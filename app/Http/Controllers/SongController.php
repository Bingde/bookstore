<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SongResource;
use App\Http\Resources\SongsCollection;
use App\Song;
use DB;
class SongController extends Controller
{
    
   public function index()	{
	   //the the number of songs from the song model
	  $count = Song::all()->count();  
	  //$data = Song::paginate(3);
 
	  $modelclass = Song::orderBy('rating','DESC')->paginate(5);
	 
	  $data = (new SongsCollection($modelclass))->additional(['meta' => [
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

  public function edit($id)
    {
      
        $results = DB::select('select * from songs where id = :id', ['id' => $id]);
        return view('edit', ['datas' => $results]);
    }
     public function update(Request $request)
    {
       
        //dd($request);
        $id= $request->id;

        $book = Song::find($id);
        $book->title = $request['title'];
        $book->artist = $request['artist'];
        $book->rating = $request['rating'];
        $book->album_id = $request['album_id'];
        
        
        $result=  $book->save();
        
        
        $count = Song::all()->count(); 
        $data = (new SongsCollection(Song::paginate(10)))->additional(['meta' => [ 'count' => $count]]);

      
        return view('edit', ['datas' => $data,'numbersong' => $count]);
    }


     public function destory($id)
    {
       
        //dd($request);
        
// 		dd($id);

        $book = Song::find($id);
        $result=  $book->delete();
       // dd($result);
        
        $count = Song::all()->count(); 
        $data = (new SongsCollection(Song::paginate(10)))->additional(['meta' => [ 'count' => $count]]);

      
        return view('songs', ['datas' => $data,'numbersong' => $count]);
    }





    
}
