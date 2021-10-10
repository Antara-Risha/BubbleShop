<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../frontend/css/forms.css">
</head>
<body>
    <form action="signup" method="POST">
        @csrf

        <h1>Sign Up</h1>
        <input type="text" name="name" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="number" name="phonenumber" placeholder="Phone Number">
        <input type="text" name="address" placeholder="Address">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirmpassword" placeholder="Confirm Password">

        <button type="submit">SignUp</button>

    </form>
</body>