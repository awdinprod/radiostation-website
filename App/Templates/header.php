<header>
    <ul class="header">
        <li class="hor-header"><a href="/">main page</a></li>
        <li class="hor-header"><a href="/online-player" target="_blank" rel="noopener noreferrer">online player</a></li>
        <li class="hor-header"><a href="/posts">posts</a></li>
        <li class="hor-header"><a href="/podcasts">podcasts</a></li>
        <?php if ($userdata != null) : ?>
            <li class="login-header"><a id="user_menu"><?php echo $userdata['username']; ?></a>
                <div class="dropdown-content" id="dropdown">
                    <a href="/user-settings">settings</a>
                    <a href="/logout">logout</a>
                </div>
            </li>
        <?php else : ?>
            <li class="login-header"><a id="loginBtn1">login</a></li>
        <?php endif; ?>
    </ul>
</header>
