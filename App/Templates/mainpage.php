<h1>Welcome To DAWN FM</h1>

<?php if ($userdata == null) :?>
<div class="center-block">
    <a href="/signup" class="main-signup-btn">Sign up</a>
    <span class="main-signup-text">And you will be able to read, listen and comment everything here</span>
</div>
<?php endif;?>

<div class="posts-mainpage">
    <a class="text-link" href="/posts">posts ></a>
    <div class="main-block posts-block">
        <?php
        foreach ($post_list_array as $one_post) : ?>
            <a class="post-temp" href="<?php echo "/singlepost/" . $one_post['id']; ?>">
                <img class="main-post-page-image" src="<?php echo $one_post['img']; ?>">
                <div class="post-texts">
                    <p class="post-title"><?php echo $one_post['title']; ?></p>
                    <p class="main-post-excerpt"><?php echo $one_post['shorttext']; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="row">
    <div class="podcasts">
        <a class="text-link" href="/podcasts">podcasts ></a>
        <div class="main-block podcasts-chart-block">
            <?php
            foreach ($podcast_list_array as $one_post) : ?>
                <a class="post-temp" href="<?php echo "/singlepodcast/" . $one_post['id']; ?>">
                    <img class="main-post-page-image" src="<?php echo $one_post['img']; ?>">
                    <div class="post-texts">
                        <p class="post-title"><?php echo $one_post['title']; ?></p>
                        <p class="main-post-excerpt"><?php echo $one_post['shorttext']; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>