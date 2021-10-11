<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../frontend/css/forms.css">
</head>
<body>
    <form action="check"  method="POST">
        @csrf
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email">
        <span type="text-danger">@error('email') {{$message}} @enderror</span>
        <input type="password" name="password" placeholder="Password">
<<<<<<< HEAD
        <span type="text-danger">@error('email') {{$message}} @enderror</span>
=======
        <span type="text-danger">@error('password') {{$message}} @enderror</span>
>>>>>>> f8870dcad7fd712d3cefa03046f50edaab2423d7
        

        <button type="submit">Login</button>
        

    </form>
</body>
