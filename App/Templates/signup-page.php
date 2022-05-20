<h1>Signup</h1>

<div class="main-block signup-page">
    <?php if ($message != null) :?>
        <span class="error-block">
        <?php echo $message; ?>
    </span>
    <?php endif; ?>
    <form action="<?php echo $_SERVER["REQUEST_URI"] . "/send-signup"?>" method="post">
        <span class="fill-in-text">Please fill in this form to create an account</span>
        <hr class="form-divider">
        <p><input type="text" class="auth-input" placeholder="Username" name="username" required></p>
        <p><input type="email" class="auth-input" placeholder="e-mail" name="email" required></p>
        <p><input type="password" class="auth-input" placeholder="Password" name="password" required></p>
        <p><input type="password" class="auth-input" placeholder="Confirm password" name="conf_password" required></p>
        <div>
            <button class="login-btn" type="submit" name="reg_user">Sign up</button>
            <span>Already have an account? <a id="loginBtn2">Login!</a></span>
        </div>
    </form>
</div>

<script type="text/javascript" src="/JS/signup-page-login-modal.js"></script>
