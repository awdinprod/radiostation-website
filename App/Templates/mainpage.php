<h1>welcome to dawn fm</h1>

<div class="main-block banner-block">
    <p>If you see this text then this banner is now unavailable and sad.</p>
    <p>But you'll be able to all cool images here pretty soon. Betcha :)</p>
</div>

<div class="posts-mainpage">
    <a class="text-link" href="/posts">posts ></a>
    <div class="main-block posts-block">
        <?php
        foreach ($postlistarray as &$onepost) : ?>
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
            foreach ($podcastlistarray as &$onepost) : ?>
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
    <div class="chart">
        <a class="text-link" href="/chart">music charts ></a>
        <div class="main-block podcasts-chart-block">
            <p>Look at this amazing chart...</p>
            <p>oh, coming soon (damn, I forgot)</p>
        </div>
    </div>
</div>