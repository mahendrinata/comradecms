<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5> Role Detail <?php echo $role['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box well form-horizontal">
          <?php
          $data = array(
              array('label' => 'Name', 'value' => $role['name']),
              array('label' => 'Description', 'value' => $role['description']),
          );
          echo bootstrap_table_view($data);
          echo anchor('admin/role', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
          ?>
        </div>
      </div>
    </div>
  </div>
</div>