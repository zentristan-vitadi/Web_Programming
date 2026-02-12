<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets_login/css/styleLogin.css">
</head>

<body>
    <div class="wrapper">
        <form action="pages/proses_login.php" method="POST" autocomplete="off">
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" required name="username">
                <label>Masukan Username</label>
            </div>
            <div class="input-field">
                <input type="password" required name="password">
                <label>Masukan Password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Ingat Aku</p>
                </label>
                <a href="#">Lupa Password?</a>
            </div>
            <button type="submit">Log In</button>
            <div class="register">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>