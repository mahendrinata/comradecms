<?php if (isset($sliders) && !empty($sliders)) { ?>
    <div id="slicebox">
        <ul id="sb-slider" class="sb-slider">
            <?php foreach ($sliders as $slider) { ?>
                <li>
                    <a href="<?php echo get_content_url($slider['ContentDetail']['slug']); ?>"><img src="<?php echo get_content_media($slider['Media'][0]['dir']); ?>" alt="image1"/></a>
                    <div class="sb-description sb-description-light">
                        <h3><span><?php echo $slider['ContentDetail']['title']; ?></span></h3>
                    </div>
                </li>
            <?php } ?>
        </ul>

        <div id="nav-arrows" class="nav-arrows">
            <a href="#"><i class="icon-chevron-left"></i></a>
            <a href="#"><i class="icon-chevron-right"></i></a>
        </div>

    </div>
<?php } ?>