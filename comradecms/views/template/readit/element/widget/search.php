<div class="widget widget_search">
    <?php echo form_open('home/search', 'method="get" id="sidebar-searchform"'); ?>
    <fieldset>
        <?php echo form_input('title', NULL, 'placeholder="To search type and hit enter"'); ?>
    </fieldset>
    <?php echo form_close(); ?>
</div>