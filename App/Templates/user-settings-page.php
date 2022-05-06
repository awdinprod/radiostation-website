
<?php if ($userdata != null) :?>
<div id="user-page" class="admin-page"></div>
<?php else : ?>
<h1>User settings</h1>
<div class="main-block signup-page">
    <span class="confirm-text">
        Sorry, you can't use this page. <a id="loginBtn2">Login</a> to use it
    </span>
</div>
<?php endif; ?>
<script src="/JS/user-page.js" type="text/babel"></script>
<script type="text/javascript" src="/JS/signup-page-login-modal.js"></script>
