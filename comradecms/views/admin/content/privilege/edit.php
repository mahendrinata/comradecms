<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5>Edit Role <?php echo $privilege['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/privilege/edit', $privilege, TRUE), array('class' => 'form-horizontal'));
          echo bootstrap_form_input('name', $privilege['name'], array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name'));
          echo bootstrap_form_textarea('description', $privilege['description'], array('class' => 'span8', 'rows' => 6, 'label' => 'Description'));
          echo bootstrap_form_input('class', $privilege['class'], array('class' => 'span6', 'placeholder' => 'Class', 'label' => 'Class'));
          echo bootstrap_form_input('method', $privilege['method'], array('class' => 'span6', 'placeholder' => 'Method', 'label' => 'Method'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/privilege', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>