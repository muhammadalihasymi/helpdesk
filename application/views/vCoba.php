<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.8.1/css/all.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login Page</title>
</head>

<body style="background: url(assets/img/background.jpg);">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1 class="headerform">Create Account</h1>
                <input type="text" placeholder="Name" />
                <input type="text" placeholder="Email" />
                <input type="password" placeholder="password" />
                <input type="password" placeholder="re-type password" />
                <button>Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="#">
                <h1 class="headerform">Sign In</h1>
                <input type="text" placeholder="Email" />
                <input type="password" placeholder="password" />
                <a href="#">Forgot Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>You have sign up in this form before? just go to sign in to login with your account</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Don't have an account? sign up to get your free account now!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>