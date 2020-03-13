<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All users</title>
</head>
<body>
    <h1>The list of all users</h1>
    <div>
        @foreach($users as $user)
            <div>
                <h3>{{$user->name.' '.$user->surname}}</h3>
                <form action="{{route('users.show', $user)}}" method="get">
                    <input type="submit" value="Look up">
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
