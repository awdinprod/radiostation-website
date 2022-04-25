<h1><?php echo ucfirst($content); ?></h1>

<div class="main-block post-page">
    <?php
    foreach ($content_list_array as $one_post) : ?>
        <a class="post-temp" href="<?php echo "/single" . substr($content, 0, -1) . "/" . $one_post['id']; ?>">
            <img class="post-page-image" src="<?php echo $one_post['img'];?>">
            <div class="post-texts">
                <p class="post-title"><?php echo $one_post['title'];?></p>
                <p class="post-excerpt"><?php echo $one_post['shorttext'];?></p>
            </div>
        </a>
        <hr class="post-divider">
    <?php endforeach; ?>
</div>