<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5> Setting Detail <?php echo $setting['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box well form-horizontal">
          <?php
          $data = array(
              array('label' => 'Slug', 'value' => $setting['slug']),
              array('label' => 'Name', 'value' => $setting['name']),
              array('label' => 'Value', 'value' => $setting['value']),
              array('label' => 'Priority', 'value' => $setting['priority']),
              array('label' => 'Created at', 'value' => $setting['created_at']),
              array('label' => 'Updated at', 'value' => $setting['updated_at']),
          );
          echo bootstrap_table_view($data);
          echo anchor('admin/setting', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
          ?>
        </div>
      </div>
    </div>
  </div>
</div>