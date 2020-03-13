<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <h1>Hi newbie!</h1>
    <div>
        <form action="{{route('register')}}" method="post">
            @csrf
            <label>Name: <input type="text" name="name"></label>
            <label>Surname: <input type="text" name="surname"></label>
            <label>Email: <input type="email" name="email"></label>
            <label>Password: <input type="password" name="password"></label>
            @error('password')
            <p style="color: red">{{$message}}</p>
            @enderror
            <label>Confirm password: <input type="password" name="password_confirmation"></label>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
<style>
    body {
        align-content: center;
    }
</style>
</html>
