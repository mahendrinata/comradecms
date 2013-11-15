<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Edit Role <?php echo $role['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          /**
           * @todo Add styling, function is complite
           */
          echo form_open(get_link('admin/role/privilege', $role, TRUE), array('class' => 'form-horizontal'));
          $role_active = array();
          foreach ($role['role_privilege'] as $role_privilege) {
            $role_active[] = $role_privilege['privilege_id'];
          }
          foreach ($privileges as $key => $privilege) {
            $option = array('label' => $privilege);
            if (in_array($key, $role_active)) {
              $option['checked'] = 'checked';
            }
            echo bootstrap_form_checkbox('role_rpivilege[][privilege_id]', $key, $option);
          }
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/role', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>