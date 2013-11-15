<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Edit Role <?php echo $role['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/role/edit', $role, TRUE), array('class' => 'form-horizontal'));
          echo bootstrap_form_input('name', $role['name'], array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name'));
          echo bootstrap_form_textarea('description', $role['description'], array('class' => 'span8', 'rows' => 6, 'label' => 'Description'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/role', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>