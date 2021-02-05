<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Song;
class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    
	   // $data = $request->toJson();
	 //  var_dump($data);
/*
	    print_r(Song::all());
		die();
*/
         return [
        'id' => $this->id,
        'title' => $this->title,
        'rating' => $this->rating,
        
    ];
    }
}
