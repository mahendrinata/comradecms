<?php if (isset($widget['video']) && !empty($widget['video'])) { ?>

    <div class="widget widget-video">
        <h3 class="widget-title"></h3>
        <div class="video-wrapper">
            <iframe src="<?php echo $widget['video']; ?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
    </div>

<?php } ?>