<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5>Create Privilege</h5>
            </div>
            <div class="widget-content">
                <div class="widget-box">
                    <?php
                    echo form_open(get_link('admin/privilege/create'), array('class' => 'form-horizontal'));
                    echo bootstrap_form_input('slug', NULL, array('class' => 'span6', 'placeholder' => 'Slug', 'label' => 'Slug' . bootstrap_text_important()));
                    echo bootstrap_form_input('name', NULL, array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name' . bootstrap_text_important()));
                    echo bootstrap_form_textarea('description', NULL, array('class' => 'span8', 'rows' => 6, 'label' => 'Description'));
                    echo bootstrap_form_input('class', NULL, array('class' => 'span6', 'placeholder' => 'Class', 'label' => 'Class' . bootstrap_text_important()));
                    echo bootstrap_form_input('method', NULL, array('class' => 'span6', 'placeholder' => 'Method', 'label' => 'Method' . bootstrap_text_important()));
                    echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
                    echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/privilege', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>