<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SongsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

	   //$data = ($this->collection)->toJson();
	   //var_dump($data);
	  // print_r($data);
	   //dd($data);
	  // var_dump($data);
	   //dd($data);
	   
/*	   $data = SongResource::collection($this->collection)->toJson();
	   var_dump($data);
	   var_dump('nice to see');	   
	  
*/
       return [
	        //           'data' => $this->collection,
            'data' => SongResource::collection($this->collection),
            
            'meta' => ['song_count' => $this->collection->count()],
        ];    
        
        
// 		return ['name' => 'Abigail', 'state' => 'CA'];
	//Return a object similar to a whole model table
    }
}
