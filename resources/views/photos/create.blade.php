<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New photo</title>
</head>
<body>
    <h1>A new photo</h1>
    <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>File: <input type="file" name="photo"></label>
        <label>Name: <input type="text" name="name"></label>
        <label>Tags: <input type="text" name="tags"></label>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
