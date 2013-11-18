<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Create Content</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/content/create'), array('class' => 'form-horizontal'));
          echo form_hidden('is_hide', FALSE);
          echo get_dropdown(NULL, 'content_detail[0][language_id]', NULL, 'Language_model', array(
              'label' => 'Language',
              'data-placeholder' => 'Language',
              'style' => 'width:300px',
              'class' => 'chzn-select',
              'tabindex' => '13'));
          echo bootstrap_form_input('content_detail[0][slug]', NULL, array('class' => 'span6', 'placeholder' => 'Slug', 'label' => 'Slug' . bootstrap_text_important()));
          echo bootstrap_form_input('content_detail[0][title]', NULL, array('class' => 'span6', 'placeholder' => 'Title', 'label' => 'Title' . bootstrap_text_important()));
          echo bootstrap_form_textarea('content_detail[0][meta_description]', NULL, array('class' => 'span8', 'rows' => 2, 'label' => 'Meta Description'));
          echo bootstrap_form_textarea('content_detail[0][short_description]', NULL, array('class' => 'span8', 'rows' => 3, 'label' => 'Short Description'));
          echo bootstrap_form_textarea('content_detail[0][description]', NULL, array('id' => 'content-editor', 'label' => 'Description'));
          echo bootstrap_form_input('media[0][name]', NULL, array('class' => 'span6', 'placeholder' => 'File/Image Title', 'label' => 'File/Image Title'));
          echo bootstrap_form_upload('media[0][url]', NULL, array('class' => 'input-file', 'label' => 'File/Image'));
          echo get_dropdown(NULL, 'content_type[][type_id]', 'type_id', 'Type_model', array(
              'label' => 'Type',
              'data-placeholder' => 'Type',
              'style' => 'width:300px',
              'class' => 'chzn-select',
              'tabindex' => '13',
              'multiple' => NULL));
          echo get_dropdown(NULL, 'content_tag[][tag_id]', 'tag_id', 'Tag_model', array(
              'label' => 'Tag',
              'data-placeholder' => 'Tag',
              'style' => 'width:300px',
              'class' => 'chzn-select',
              'tabindex' => '13',
              'multiple' => NULL));
          echo bootstrap_form_checkbox('is_active', TRUE, array('label' => 'Active Status', 'checked' => 'checked'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/content', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#content-editor").cleditor({
    width: 80 + '%',
    height: 400,
  });

</script>  