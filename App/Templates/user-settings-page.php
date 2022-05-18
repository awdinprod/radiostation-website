<h1>Settings</h1>

<div class="main-block signup-page">
    <?php if ($message != null) :?>
        <span class="error-block">
        <?php echo $message; ?>
    </span>
    <?php endif; ?>
    <div class="user-settings">
        <form class="settings-form" action="/api-user-changedata" method="post">
            <label>Change username:
                <input type="text" name="username" class="settings-input" placeholder="Enter new username">
            </label>
            <label>Change email:
                <input type="email" name="email" class="settings-input" placeholder="Enter new email">
            </label>
            <button type="submit" class="submit-btn" name="change_user_data">Submit changes</button>
        </form>
    </div>
</div>
