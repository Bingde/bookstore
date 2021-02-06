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
	 return [
            'data' => SongResource::collection($this->collection),
            'meta' => ['song_count' => $this->collection->count()],
        ];    
        
        
// 		return ['name' => 'Abigail', 'state' => 'CA'];
	//Return a object similar to a whole model table
    }
    public function with($request)
    {
        return [
	         'metawithcount' => [
                'mycount' => '999',
            ],
//             'meta' =>['song_count' => $this->collection->count()],    
            ];
    }
    
}
