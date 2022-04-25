<header>
    <ul class="header">
        <li class="hor-header"><a href="/">main page</a></li>
        <li class="hor-header"><a href="/online-player" target="_blank" rel="noopener noreferrer">online player</a></li>
        <li class="hor-header"><a href="/posts">posts</a></li>
        <li class="hor-header"><a href="/podcasts">podcasts</a></li>
        <?php if (isset($_COOKIE['username'])) : ?>
            <li class="login-header"><a href="#" id="myBtn"><?php echo $_COOKIE['username']; ?></a></li>
        <?php else : ?>
            <li class="login-header"><a href="#" id="myBtn">login</a></li>
        <?php endif; ?>

    </ul>
</header>
