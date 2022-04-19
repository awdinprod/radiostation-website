<h1>Welcome To DAWN FM</h1>

<div class="posts-mainpage">
    <a class="text-link" href="/posts">posts ></a>
    <div class="main-block posts-block">
        <?php
        foreach ($post_list_array as $onepost) : ?>
            <a class="post-temp" href="<?php echo "/singlepost/" . $onepost['id']; ?>">
                <img class="main-post-page-image" src="<?php echo $onepost['img']; ?>">
                <div class="post-texts">
                    <p class="post-title"><?php echo $onepost['title']; ?></p>
                    <p class="main-post-excerpt"><?php echo $onepost['shorttext']; ?></p>
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
            foreach ($podcast_list_array as $onepost) : ?>
                <a class="post-temp" href="<?php echo "/singlepodcast/" . $onepost['id']; ?>">
                    <img class="main-post-page-image" src="<?php echo $onepost['img']; ?>">
                    <div class="post-texts">
                        <p class="post-title"><?php echo $onepost['title']; ?></p>
                        <p class="main-post-excerpt"><?php echo $onepost['shorttext']; ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>