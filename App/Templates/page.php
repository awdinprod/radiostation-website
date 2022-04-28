<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DAWN FM</title>
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <link href="/Styles/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
echo $this->header;
?>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form method="post">
            <h2>Login</h2>
            <label><input type="text" placeholder="Username or email" name="username" required></label>
            <label><input type="password" placeholder="Password" name="password" required></label>
            <div class="remember">
                <input type="checkbox" class="custom-checkbox" id="remember">
                <label for="remember">Remember me?</label>
            </div>
            <div>
                <button class="login-btn" type="submit" name="login_user">Login</button>
                <span>First time here? <a href="/signup">Sign up!</a></span>
                <span><a href="/forgot-password">Forgot password?</a></span>
            </div>
        </form>
    </div>
</div>

<?php
echo $page_temp;
?>

<?php
echo $this->footer;
?>
    <script type="text/javascript" src="/JS/login-modal.js"></script>
</body>
</html>