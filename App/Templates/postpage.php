<h1>posts</h1>

<div class="main-block post-page">
    <?php
    foreach ($postscontent as &$onepost) : ?>
        <a class="post-temp" href="<?php echo "/singlepost/" . $onepost['id']; ?>">
            <img class="post-page-image" src="<?php echo $onepost['postimg'];?>">
            <div class="post-texts">
                <p class="post-title"><?php echo $onepost['title'];?></p>
                <p class="post-excerpt"><?php echo $onepost['excerpt'];?></p>
            </div>
        </a>
        <hr class="post-divider">
    <?php endforeach; ?>
</div>