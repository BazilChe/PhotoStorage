<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->name.' '.$user->surname}}</title>
</head>
<body>
    <h1>{{$user->name.' '.$user->surname}}</h1>
    <p>
        Email: <i>{{$user->email}}</i>
    </p>
    <hr>
    @if($isOwner)
        <form action="{{route('photos.create')}}" method="get">
            <label>Have a new photo to share? <input type="submit" value="Yep!"></label>
        </form>
    @endif
    <ul>
        @foreach($user->photos as $photo)
            <li>
                <h3>{{$photo->name}}</h3>
                <img src="{{url('storage/'.$photo->photo)}}" alt="Image was not loaded :(" height="200" width="300">
                <br>
                <i>{{'created at: '.$photo->created_at}}</i>
                <p>
                    @foreach($photo->tags as $tag)
                        <a href="{{url('/photos?tag='.str_replace('#','',$tag->name))}}">{{$tag->name}}</a>
                    @endforeach
                </p>
            </li>
        @endforeach
    </ul>
</body>
</html>
