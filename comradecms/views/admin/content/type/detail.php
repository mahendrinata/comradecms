<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5> Type Detail <?php echo $type['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box well form-horizontal">
          <?php
          $data = array(
              array('label' => 'Name', 'value' => $type['name']),
              array('label' => 'Description', 'value' => $type['description']),
          );
          echo bootstrap_table_view($data);
          echo anchor('admin/type', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
          ?>
        </div>
      </div>
    </div>
  </div>
</div>