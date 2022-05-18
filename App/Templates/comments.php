<div class="comment-title">Comments:
    <?php if ($user != null) : ?>
        <a class="add-comment-button" id="commentBtn">Add a comment</a>
    <?php endif; ?>
</div>
<?php if (!$comments) : ?>
    <div class="post-temp">
        <div class="comment-title">No comments here...</div>
    </div>
<?php else :
    foreach ($comments as $one_comment) : ?>
    <div class="post-temp">
        <div class="comment-texts">
            <span class="comment-user"><?php echo $one_comment['username']; ?>:</span>
            <span class="comment-bodytext"><?php echo $one_comment['body_text']; ?></span>
        </div>
        <div class="comment-buttons">
            <?php if (
                $user['role'] == 'editor' ||
                $user['role'] == 'admin' ||
                $one_comment['user_id'] == $user['user_id']
            ) : ?>
                <a href="<?php echo $_SERVER['REQUEST_URI'] . "/" . $one_comment['id'] . "/edit"?>"
                   class="edit-comment-button">Edit</a>
                <form action="<?php echo $_SERVER['REQUEST_URI'] . "/" . $one_comment['id'] . "/delete_comment";?>"
                      method="post">
                    <button class="delete-comment-button" type="submit" name="delete_comment">Delete</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach;
endif; ?>

</div>
<?php if ($user != null) : ?>
    <div id="comment_modal" class="modal">
        <div class="modal-content">
            <span class="close_comment">&times;</span>
            <form action="<?php echo $_SERVER['REQUEST_URI'] . "/send_comment";?>" method="post">
                <h2>Add a comment</h2>
                <textarea type="text" placeholder="Add a comment" name="comment_text" required></textarea>
                <div>
                    <button class="comment-button-modal" type="submit" name="send_comment">Add a comment</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="/JS/comment-modal.js"></script>
<?php endif; ?>
