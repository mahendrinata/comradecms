<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5>Language Detail <?php echo $language['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box well form-horizontal">
          <?php
          $data = array(
              array('label' => 'Slug', 'value' => $language['slug']),
              array('label' => 'Name', 'value' => $language['name']),
              array('label' => 'Created at', 'value' => $language['created_at']),
              array('label' => 'Updated at', 'value' => $language['updated_at']),
          );
          echo bootstrap_table_view($data);
          echo anchor('admin/language', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
          ?>
        </div>
      </div>
    </div>
  </div>
</div>