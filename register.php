<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register Yourself</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <p>
            Name: <input type="text" name="name">
        </p>
        <p>
            Email: <input type="text" name="email">
        </p>
        <p>
            Password: <input type="password" name="password">
        </p>
        <p>
            Image: <input type="file" name="image">
        </p>
        <input type="hidden" name="action" value="register">
        <input type="submit" value="register">
    </form>
    <a href="index.php">Already have an account? Log In</a>
</body>

</html>