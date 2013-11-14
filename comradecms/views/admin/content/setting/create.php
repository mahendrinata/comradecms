<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5>Create Setting</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/setting/create'), array('class' => 'form-horizontal'));
          echo form_hidden('is_hide', FALSE);
          echo bootstrap_form_input('slug', NULL, array('class' => 'span6', 'placeholder' => 'Slug', 'label' => 'Slug' . bootstrap_text_important()));
          echo bootstrap_form_input('name', NULL, array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name' . bootstrap_text_important()));
          echo bootstrap_form_input('value', NULL, array('class' => 'span6', 'placeholder' => 'Value', 'label' => 'Value' . bootstrap_text_important()));
          echo bootstrap_form_input('priority', NULL, array('class' => 'span6', 'placeholder' => 'Priority', 'label' => 'Priority' . bootstrap_text_important()));
          echo bootstrap_form_checkbox('is_active', TRUE, array('label' => 'Active Status', 'checked' => 'checked'));
          echo bootstrap_form_checkbox('is_default', TRUE, array('label' => 'Default Setting'));
          echo get_dropdown(NULL, 'type_id', NULL, 'Type_model', array(
              'label' => 'Type',
              'data-placeholder' => 'Type',
              'style' => 'width:300px',
              'class' => 'chzn-select',
              'tabindex' => '13'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/setting', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>