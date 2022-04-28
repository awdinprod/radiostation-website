<header>
    <ul class="header">
        <li class="hor-header"><a href="/">main page</a></li>
        <li class="hor-header"><a href="/online-player" target="_blank" rel="noopener noreferrer">online player</a></li>
        <li class="hor-header"><a href="/posts">posts</a></li>
        <li class="hor-header"><a href="/podcasts">podcasts</a></li>
        <?php if (isset($_COOKIE['username'])) : ?>
            <li class="login-header"><a href="#" id="user_menu"><?php echo $_COOKIE['username']; ?></a>
                <div class="dropdown-content" id="dropdown">
                    <a href="/logout">Logout</a>
                </div>
            </li>
        <?php else : ?>
            <li class="login-header"><a href="#" id="loginBtn1">login</a></li>
        <?php endif; ?>
    </ul>
</header>
