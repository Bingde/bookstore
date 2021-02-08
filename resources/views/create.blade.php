<form method="POST" action="/api/songs">
					    @csrf
					<label for="title">Title</label>
						<input id="title" type="text" class="" name ="title"><br>
		<label for="title">Artist</label>
						<input id="title" type="text" class="" name ="artist"><br>
						<label for="title">Rating</label>
						<input id="title" type="text" class="" name ="rating"><br>
						<label for="title">Album Id</label>
						<input id="title" type="text" class="" name ="album_id">
						<button type="submit">Submit</button>
					</form>