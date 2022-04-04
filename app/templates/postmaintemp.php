<a class="post-temp" href="<?php echo "/singlepost/".$postcontent[$i]['id'];?>">
    <img class="main-post-page-image" src="<?php echo $postcontent[$i]['postimg'];?>">
    <div class="post-texts">
        <p class="post-title"><?php echo $postcontent[$i]['title'];?></p>
        <p class="post-excerpt"><?php echo $postcontent[$i]['excerpt'];?></p>
    </div>
</a>
<?php if($i != ($size - 1))
    echo "<hr class='post-divider'>";
?>


