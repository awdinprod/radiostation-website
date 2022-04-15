<h1>podcasts</h1>

<div class="main-block post-page">
    <div class="post-temp">
        <img class="singlepost-page-image" src="<?php echo $singlecontentarray['img'];?>">
        <div class="post-texts">
            <p class="post-title"><?php echo $singlecontentarray['title'];?></p>
            <p class="post-excerpt"><?php echo $singlecontentarray['shorttext'];?></p>
            <audio controls>
                <source src="<?php echo $singlecontentarray['audiourl'];?>">
            </audio>
            <hr class="post-divider">
        </div>
    </div>
</div>
