<h1>podcasts</h1>

<div class="main-block post-page">
    <div class="post-temp">
        <img class="singlepost-page-image" src="<?php echo $singlecontentarray['img'];?>">
        <div class="post-texts">
            <p class="post-title"><?php echo $singlecontentarray['title'];?></p>
            <p class="post-excerpt"><?php echo $singlecontentarray['shorttext'];?></p>
            <audio data-src="<?php echo $singlecontentarray['audiourl'];?>" type="audio/mpeg"></audio>
            <div class="audio-player">
                <div class="timeline">
                    <div class="progress"></div>
                </div>
                <div class="controls">
                    <div class="play-container">
                        <div class="toggle-play play">
                        </div>
                    </div>
                    <div class="time">
                        <div class="current">0:00</div>
                        <div class="divider">/</div>
                        <div class="length"></div>
                    </div>
                    <div class="name"><?php echo $singlecontentarray['title'];?></div>

                    <div class="volume-container">
                        <div class="volume-button">
                            <div class="volume icono-volumeMedium"></div>
                        </div>

                        <div class="volume-slider">
                            <div class="volume-percentage"></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="post-divider">
        </div>
    </div>
</div>

<script type="text/javascript" src="/JS/audioplayer.js"></script>
