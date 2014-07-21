<div id="main">
    <div id="cover" class="no-cover">
        <div id="overlay">
            <div id="overlay-wrapper">
                <h1><span id="title"><?php echo $content['ContentDetail']['title']; ?></span></h1>
                <h2><span id="subtitle"><?php echo $content['ContentDetail']['subtitle']; ?></span></h2>
            </div>
        </div>
    </div>
    <div id="content" class="group">
        <div id="main-content" class="col span_3_of_4">
            <?php echo $content['ContentDetail']['description']; ?>
        </div>
        <div id="side-content" class="col span_1_of_4">
            <blockquote>
                <i class="icon-quote-left icon-2x pull-left icon-muted"></i>
                <?php echo $content['ContentDetail']['short_description']; ?>
                <i class="icon-quote-right icon-2x pull-right icon-muted"></i>
            </blockquote>
        </div>
    </div>
    <div id="author-and-share" class="group">
        <div id="share" class="col span_1_of_4">
            <h2>Share the article</h2>
            <div class="twitter" data-url="<?php echo get_content_url($content['ContentDetail']['slug']); ?>" data-text="<?php echo $content['ContentDetail']['title']; ?>" data-title="Tweet"></div>
            <div class="facebook" data-url="<?php echo get_content_url($content['ContentDetail']['slug']); ?>" data-text="<?php echo $content['ContentDetail']['title']; ?>" data-title="Like"></div>
            <div class="googleplus" data-url="<?php echo get_content_url($content['ContentDetail']['slug']); ?>" data-text="<?php echo $content['ContentDetail']['title']; ?>" data-title="+1"></div>
        </div>
        <div id="author" class="col span_3_of_4">
            <div class="avatar">
                <img alt="avatar" src="<?php echo get_user_avatar($content['User']['photo']); ?>">
            </div>
            <div class="author-body">
                <a href="#" class="pseudo"><h2><?php echo get_full_name($content['User']); ?></h2></a>
                <div class="author-social">
                    <a class="author-facebook" href="#">
                        <i class="icon-facebook"></i><span>facebook</span>
                    </a>
                    <a class="author-twitter" href="#">
                        <i class="icon-twitter"></i><span>twitter</span>
                    </a>
                    <a class="author-googleplus" href="#">
                        <i class="icon-google-plus"></i><span>google plus</span>
                    </a>
                    <a class="author-pinterest" href="#">
                        <i class="icon-pinterest"></i><span>pinterest</span>
                    </a>
                </div>
                <p><?php echo $content['User']['description']; ?></p>
            </div>
        </div>
    </div>
    <!-- Comments -->
    <!--  <div id="comments">
        <ol class="commentlist">
          <li class="comment">
            <div>
              <img alt="" src="images/avatars/mail.png" class="avatar" height="35" width="35">
              <div class="comment-author vcard">
                <cite class="fn">
                  <a href="#">Félix</a>
                </cite>
              </div>
    
              <div class="comment-meta">
                <a href="#">October 15, 2011 at 4:17 pm</a>
                / <a class="comment-reply-link" href="#">Reply</a>
              </div>
    
              <div class="comment-body">
                <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
              </div>
            </div>
    
          </li>
        </ol>
      </div>-->