<div class="modal-content">
    <span class="close">&times;</span>
    <form action="/login" method="post">
        <h2>Login</h2>
        <label><input type="text" class="auth-input" placeholder="Username or email" name="username" required></label>
        <label><input type="password" class="auth-input" placeholder="Password" name="password" required></label>
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

<script type="text/javascript" src="/JS/login-modal.js"></script>
