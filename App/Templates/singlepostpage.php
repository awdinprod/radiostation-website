<h1>Posts</h1>

<div class="main-block post-page">
    <div class="post-temp">
        <img class="single-post-page-image" src="<?php
        echo $single_content_array['img']; ?>">
        <div class="post-texts">
            <p class="post-title"><?php
                echo $single_content_array['title']; ?></p>
            <p class="post-excerpt"><?php
                echo $single_content_array['shorttext']; ?></p>
            <p class="post-bodytext"><?php
                echo $single_content_array['bodytext'] ?></p>
        </div>
    </div>
    <hr class="post-divider">
    <?php echo $comments; ?>
