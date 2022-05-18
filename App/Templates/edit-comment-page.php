<div class="main-block login-page">
    <div class="form-padding">
        <form action="<?php echo $_SERVER['REQUEST_URI'] . "_comment";?>" method="post">
            <h2>Edit comment</h2>
            <label>
                <textarea type="text" placeholder="Edit comment" name="comment_text" required><?php echo $message; ?></textarea>
            </label>
            <div>
                <button class="comment-button-modal" type="submit" name="edit_comment">Edit comment</button>
            </div>
        </form>
    </div>

</div>