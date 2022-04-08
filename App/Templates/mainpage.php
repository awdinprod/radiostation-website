<div class="main-block banner-block">
    <p>If you see this text then this banner is now unavailable and sad.</p>
    <p>But you'll be able to all cool images here pretty soon. Betcha :)</p>
</div>

<div class="posts-mainpage">
    <a class="text-link" href="/posts">posts ></a>
    <div class="main-block posts-block">
        <div class="post-column-left border-right">
            <?php
            for ($i = 0, $size = min(3, sizeof($postcontent)); $i < $size; $i++) {
                require $posttmp;
            }
            ?>
        </div>
        <div class="post-column-right">
            <?php
            for ($i = 3, $size = min(6, sizeof($postcontent)); $i < $size; $i++) {
                require $posttmp;
            }
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="podcasts">
        <a class="text-link" href="/podcasts">podcasts ></a>
        <div class="main-block podcasts-chart-block">
            <p>Podcasts will be available soon.</p>
            <p>Prepare your headphones</p>
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