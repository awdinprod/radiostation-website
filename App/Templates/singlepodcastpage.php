<h1>Podcasts</h1>

<div class="main-block post-page">
    <div class="post-temp">
        <img class="single-post-page-image" src="<?php echo $single_content_array['img'];?>">
        <div class="post-texts">
            <p class="post-title"><?php echo $single_content_array['title'];?></p>
            <p class="post-excerpt"><?php echo $single_content_array['shorttext'];?></p>
            <audio data-src="<?php echo $single_content_array['audiourl'];?>" type="audio/mpeg"></audio>
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
                    <div class="name"><?php echo $single_content_array['title'];?></div>

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
        </div>
    </div>
    <hr class="post-divider">
    <?php if (!$comments) : ?>
        <div class="post-temp">
            <div class="post-title">No comments here...</div>
        </div>
    <?php else :
        foreach ($comments as $one_comment) : ?>
            <div class="post-temp">
                <div class="post-texts">
                    <p class="post-excerpt"><?php echo $one_comment['user_id']; ?>: </p>
                    <p class="post-bodytext"><?php echo $one_comment['body_text']; ?></p>
                </div>
            </div>
        <?php endforeach;
    endif; ?>
</div>

<script type="text/javascript" src="/JS/audioplayer.js"></script>
