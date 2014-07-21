<?php if (isset($widget['image']) && !empty($widget['image'])) { ?>

    <div class="widget widget-popular">
        <h3 class="widget-title"></h3>
        <div class="fancy-carousel">
            <ul class="widget-carousel">
                <?php foreach ($widget['image'] as $image) { ?>
                    <li>
                        <div class="overlay-thumb">
                            <img width="200" height="140" src="<?php echo $image['dir']; ?>" alt="<?php echo $image['name']; ?>">
                            <a class="fancy-overlay" href="#">
                                <h5 class="overlay-title"><?php echo $image['name']; ?></h5>
                                <div class="overlay-icon">
                                    <i class="icon-share-alt"></i>
                                </div>
                            </a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="popular-nav">
                <span class="prev-popular"><i class="icon-chevron-left"></i></span>
                <span class="next-popular"><i class="icon-chevron-right"></i></span>
            </div>
        </div>
    </div>

<?php } ?>