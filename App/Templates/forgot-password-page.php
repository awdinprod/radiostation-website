<h1>Password recovery</h1>

<div class="main-block signup-page">
    <?php if ($message != null) :?>
    <span class="error-block">
        <?php echo $message; ?>
    </span>
    <?php endif; ?>

    <form action="<?php echo $_SERVER['REQUEST_URI'] . "/recover-password"; ?>" method="post">
        <span class="fill-in-text">Please enter your email</span>
        <hr class="form-divider">
        <p><input type="email" class="auth-input" placeholder="e-mail" name="email" required></p>
        <div>
            <button class="login-btn" type="submit" name="recover_password">Recover password</button>
        </div>
    </form>
</div>
