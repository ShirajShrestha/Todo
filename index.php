<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <title>Document</title>
</head>

<body>
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="process.php" method="POST">
        <p>
            Email: <input type="text" name="email">
        </p>
        <p>
            Password: <input type="password" name="password">
        </p>
        <input type="hidden" name="action" value="login">
        <input type="submit" value="login">
    </form>
    <a href="register.php">Are you new? Register!!</a>
    <!-- <div class="Login-form">
        <div class="logo"><a href="index.html"><i class="fab fa-joomla"></i></a></div>
        <div class="welcome">
            <h1>Welcome to Orion</h1>
        </div>

        <div class="Login_details">
            <form action="process.php" method="post">
                <div>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password">
                </div>

                <div class="forgot">
                    <a href="#">Forgot your password?</a>
                </div>

                <input type="hidden" name="action" value="login">
                <div class="buttns">
                    <button class="btn1" type="submit" value="login">
                        <div>Log In</div>
                    </button>
                    <p class="or">OR
                    </p>
                    <button class="btn2" type="submit">
                        <div> <i class="fab fa-facebook"></i> Continue with Facebook</div>
                    </button><br>
                    <button class="btn3" type="submit">
                        <div> <i class="fab fa-google"></i> Continue with Google </div>
                    </button>
                </div>
            </form>
        </div>

        <footer>

            <div class="link">
                Not on Orion yet?<a href="register.php"> Sign up</a>
            </div>
            <div class="link">
                <a href="#">Are you a business?
                    Get started here!</a>
            </div>
        </footer>
    </div> -->
</body>

</html>