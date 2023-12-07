<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Security</title>
</head>

<body>




    <div style="text-align: center">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
            <form action="{{ route('register') }}" method="post" autocomplete="off">
                @csrf
                <label for="email">Mail:</label><br>
                <input type="text" id="email" name="email"><br>
                <br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name"><br>
                <br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <br>
                <input type="submit" value="Register">
            </form>
        </form>
        <a href="/login">Есть аккаунт</a>

    </div>

</body>

</html>
