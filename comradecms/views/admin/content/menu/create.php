<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Create Menu</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/menu/create'), array('class' => 'form-horizontal'));
          echo bootstrap_form_input('name', NULL, array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name' . bootstrap_text_important()));
          echo bootstrap_form_checkbox('is_active', TRUE, array('label' => 'Active Status', 'checked' => 'checked'));
          echo get_dropdown(NULL, 'type_id', NULL, 'Type_model', array(
              'label' => 'Type',
              'data-placeholder' => 'Type',
              'style' => 'width:300px',
              'class' => 'chzn-select',
              'tabindex' => '13'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/menu', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>