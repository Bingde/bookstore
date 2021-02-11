@foreach($datas as $data)


<form method="POST" action="/api/songs/{$id}">
					    @csrf
@method('PUT')	

<?php 
	//dd($datas);

	?>	

<label for="title">Title</label>
						<input id="title" value ="{{$data->title}}" type="text" class="" name ="title"><br>
		<label for="title">Artist</label>
						<input id="title" value ="{{$data->artist}}" type="text" class="" name ="artist"><br>
						<label for="title">Rating</label>
						<input id="title" value ="{{$data->rating}}" type="text" class="" name ="rating"><br>
						<label for="title">Album Id</label>
						<input id="title" value ="{{$data->album_id}}"  type="text" class="" name ="album_id">
						<input id="title" value ="{{$data->id}}"  type="text" class="" hidden name ="id">
						<button type="submit">Submit</button>
					</form>
	 @endforeach