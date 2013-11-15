<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Edit Setting <?php echo $setting['name']; ?></h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/setting/edit', $setting, TRUE), array('class' => 'form-horizontal'));
          echo bootstrap_form_input('name', $setting['name'], array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name'));
          echo bootstrap_form_input('value', $setting['value'], array('class' => 'span6', 'placeholder' => 'Value', 'label' => 'Value'));
          echo bootstrap_form_input('priority', $setting['priority'], array('class' => 'span6', 'placeholder' => 'Priority', 'label' => 'Priority'));
          echo get_dropdown($setting['type_id'], 'type_id', NULL, 'Type_model', array(
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