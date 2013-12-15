<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5> Menu Detail <?php echo $menu['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box well form-horizontal">
          <?php
          $data = array(
              array('label' => 'Name', 'value' => $menu['name']),
              array('label' => 'Priority', 'value' => $menu['priority']),
              array('label' => 'Created at', 'value' => $menu['created_at']),
              array('label' => 'Updated at', 'value' => $menu['updated_at']),
          );
          echo bootstrap_table_view($data);
          echo anchor('admin/menu', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
          ?>
        </div>
      </div>
    </div>
  </div>
</div>