<div class="widget widget-audio">
    <h3 class="widget-title">Audio widget</h3>
    <div class="audio-wrapper">
        <audio preload="auto" controls>
            <?php foreach ($widget['audio'] as $audio) { ?>
                <source src="<?php echo $audio ?>">
            <?php } ?>
        </audio>
    </div>
</div>