<div id="home" class="group">
  <div id="timeline" class="col span_2_of_3">  
    <?php foreach ($contents as $content) { ?>
      <div class="timeline-item">
        <div class="timeline-author-date"><span><?php echo datetime_to_date($content['Content']['updated_at']); ?></span></div>
        <a href="blog.html" class="timeline-author-link">
          <img alt="avatar" src="<?php echo get_user_avatar($content['User']['photo']); ?>">
        </a>
        <a href="<?php echo get_content_url($content['ContentDetail']['slug']); ?>" class="timeline-item-link">
          <div class="timeline-item-content <?php if (empty($content['ContentMedia'])) echo 'timeline-no-item-cover'; ?>">
            <?php if (!empty($content['ContentMedia'])) { ?>
              <div class="timeline-item-cover">
                <img src="<?php echo get_content_media($content['ContentMedia'][0]['dir']); ?>" alt="<?php echo $content['ContentDetail']['title']; ?>">
              </div>
            <?php } ?>
            <h2><?php echo $content['ContentDetail']['title']; ?></h2>
            <p><?php echo $content['ContentDetail']['short_description']; ?></p>
            <div class="timeline-item-meta"><span class="timeline-item-author"><?php echo get_full_name($content['User']); ?></span>, <span class="timeline-item-comments-count"><?php echo $content['Comment']['count']; ?> comments</span></div>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>

  <?php $this->load->view($template . 'element/content/sidebar'); ?>

</div>