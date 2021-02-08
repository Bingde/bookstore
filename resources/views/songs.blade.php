<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Songs</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 800;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
/*            make defult pagination looks better */
	.pagination >li {
		padding:20px;
	}
	.pagination
	{
		padding-inline-start: 0px! important;
		list-style-type: none;
	    display: inline-flex;
 	}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Songs
                </div>

              <table style="width:100%">
					  <tr>
					    <th>ID</th>
					    <th>Title</th>
					    <th>Artist</th>
					    <th>RATING</th>
					  </tr>
                 @foreach($datas as $data)
				  		<tr>
					    <td>{{$data->id}}</td>
					    <td>{{$data->title}}</td>
					    <td>{{$data->artist}}</td>
					    <td>{{$data->rating}}</td>
					  </tr>
				 @endforeach
					</table>
				   <div class="pagination-bar text-center">
					   {{ $datas->links('vendor.pagination.default') }}
					</div>
					<p style="background-color:white"></p>
					<?php 
	               // $count = data_get($datas, 'additional.meta.count');
	                //dd($datas);
	                $datas = json_encode($datas,true);
	                 //dd($data);
	                $datas = json_decode($datas);
	               // dd($datas);
	                foreach($datas->meta as $link){
		              echo $link;
	                }
	                
	              ?>
	              
	              @foreach($datas->meta as $link)
				    <a>{{ $link}}</a>
				  @endforeach
				
					@include('create')
					 
			        <div class="links" style="display:none">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                
                
            </div>
        </div>
    </body>
</html>
