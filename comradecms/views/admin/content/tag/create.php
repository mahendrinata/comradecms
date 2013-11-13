<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5>Create Tag</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/tag/create'), array('class' => 'form-horizontal'));
          echo bootstrap_form_input('name', NULL, array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name' . bootstrap_text_important()));
          echo bootstrap_form_textarea('description', NULL, array('class' => 'span8', 'rows' => 6, 'label' => 'Description'));
          echo bootstrap_form_checkbox('is_active', TRUE, array('label' => 'Active Status', 'checked' => 'checked'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/tag', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>