<h1>Change password</h1>

<div class="main-block signup-page">
    <?php if ($message != null) :?>
    <span class="error-block">
        <?php echo $message; ?>
    </span>
    <?php endif; ?>
    <form method="post">
        <span class="fill-in-text">Please enter and confirm new password</span>
        <hr class="post-divider">
        <p><input type="password" class="auth-input" placeholder="Password" name="password" required></p>
        <p><input type="password" class="auth-input" placeholder="Confirm password" name="conf_password" required></p>
        <div>
            <button class="login-btn" type="submit" name="new_password">Change password</button>
        </div>
    </form>
</div>
