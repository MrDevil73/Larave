<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Authorization</title>
</head>

<body>




<div style="text-align: center">

    <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        <label for="email">Mail:</label><br>
        <input type="text" id="email" name="email"><br>
        <br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <br>
        <input type="submit" value="Auth">
    </form>
    <a href="/register">Регистрация</a>



</div>

</body>

</html>
