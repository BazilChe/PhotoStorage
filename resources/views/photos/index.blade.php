<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos</title>
</head>
<body>
    <h1>All photos are here!</h1>
    <div>
        <ul>
            @foreach($photos as $photo)
                <li>
                    <h3>{{$photo->name}}</h3>
                    <img src="{{url("storage/".$photo->photo)}}" alt="wtf?!" height="200" width="300">
                    <p>{{"Uploaded by ".$photo->user->name." at ".$photo->created_at}}</p>
                    @foreach($photo->tags as $tag)
                        <a href="{{url('/photos?tag='.str_replace('#','',$tag->name))}}">{{$tag->name}}</a>
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
