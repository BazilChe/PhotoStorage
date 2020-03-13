<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Here we go again!</h1>
    <form action="{{route('login')}}" method="post">
        @csrf
        <login>Login:<input type="email" name="email"></login>
        <login>Password:<input type="password" name="password"></login>
        <input type="submit" value="Submit">
    </form>
</body>
<style>
    body {
        align-content: center;
    }?_token=BpYDLhsMyxd1MYSiNprbmmderOunIShyrpfvLbVL&email=name%40mail.ru&password=12345678
</style>
</html>
