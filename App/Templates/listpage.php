<h1><?php echo $content; ?></h1>

<div class="main-block post-page">
    <?php
    foreach ($contentlistarray as &$onepost) : ?>
        <a class="post-temp" href="<?php echo "/single" . substr($content, 0, -1) . "/" . $onepost['id']; ?>">
            <img class="post-page-image" src="<?php echo $onepost['img'];?>">
            <div class="post-texts">
                <p class="post-title"><?php echo $onepost['title'];?></p>
                <p class="post-excerpt"><?php echo $onepost['shorttext'];?></p>
            </div>
        </a>
        <hr class="post-divider">
    <?php endforeach; ?>
</div>