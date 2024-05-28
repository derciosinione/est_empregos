<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
            integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
            crossorigin="anonymous"
    />
    <title>Login</title>
    <link rel="stylesheet" href="css/login-style.css">

</head>

<body>
<div class="logo">
    <h4><span class="first-word">Est</span> Empregos</h4>
</div>

<section class="bg">
    <div class="testimonial-container">
        <div class="progress-bar"></div>
        <div class="fas fa-quote-right fa-quote"></div>
        <div class="fas fa-quote-left fa-quote"></div>
        <p class="testimonial">
            Hoje, criamo soluções inovadoras para os desafios que os consumidores enfrentam no dia a dia e
            nos eventos
        </p>
    </div>
</section>

<div class="container" id="container">

    <div class="form-container sign-up">

        <form action="" method="post">
            <h1>Create Account</h1>
            <input type="text" placeholder="Name">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="password" placeholder="Confirm Password">
            <button>Sign Up</button>
        </form>
    </div>


    <div class="form-container sign-in">
        <div style="text-align: center; padding-top: 10px">
            <?php include "../displayMessageIfExists.php" ?>
        </div>

        <form action="../../backend/Handlers/login/login.php" method="post">
            <h1>Sign In</h1>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <div class="remember-but">
                <input type="checkbox" id="remember" class="but">
                <label for="remember" class="label">
                    <div class="ball"></div>
                </label>
                <span>Remember me</span>
            </div>
            <a href="#"> Forgot Your Password?</a>
            <button type="submit">Log In</button>
        </form>

    </div>

    <div class="toggle-container">
        <div class="toggle">

            <div class="toggle-panel toggle-left">
                <h1>Hello There!!</h1>
                <p>Register with your personal details to use all of our site features</p>
                <button class="hidden" id="login">Sign In</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all of our site features</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>

        </div>
    </div>
</div>


<script src="js/login-script.js"></script>
</body>
</html>