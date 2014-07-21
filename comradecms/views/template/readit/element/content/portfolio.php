<?php if (isset($portfolios) && !empty($portfolios)) { ?>
    <div id="recent-work">
        <h2>Recent Work</h2>
        <ul id="portfolio-items" class="group">
            <?php foreach ($portfolios as $portfolio) { ?>
                <li>
                    <div class="overlay-thumb">
                        <img width="200" height="140" src="<?php echo get_content_media($portfolio['ContentMedia'][0]['dir']); ?>" alt="<?php echo $portfolio['ContentDetail']['title']; ?>">
                        <a class="fancy-overlay" href="<?php echo get_content_url($portfolio['ContentDetail']['slug']); ?>">
                            <h5 class="overlay-title"><?php echo $portfolio['ContentDetail']['title']; ?></h5>
                            <div class="overlay-icon">
                                <i class="icon-share-alt"></i>
                            </div>
                        </a>
                    </div>
                </li>
            <?php } ?>      
        </ul>
    </div>
<?php } ?>