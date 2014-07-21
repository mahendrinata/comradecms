<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5>Edit User <?php echo $user['username']; ?></h5>
            </div>
            <div class="widget-content">
                <div class="widget-box">
                    <?php
                    echo form_open(get_link('admin/user/edit', $user, TRUE), array('class' => 'form-horizontal'));
                    echo bootstrap_form_input('username', $user['username'], array('disabled' => 'disabled', 'class' => 'span6', 'placeholder' => 'Username', 'label' => 'Username' . bootstrap_text_important()));
                    echo bootstrap_form_input('first_name', $user['first_name'], array('class' => 'span6', 'placeholder' => 'First Name', 'label' => 'First Name' . bootstrap_text_important()));
                    echo bootstrap_form_input('middle_name', $user['middle_name'], array('class' => 'span6', 'placeholder' => 'Middle Name', 'label' => 'Middle Name'));
                    echo bootstrap_form_input('last_name', $user['last_name'], array('class' => 'span6', 'placeholder' => 'Last Name', 'label' => 'Last Name'));
                    echo bootstrap_form_textarea('address', $user['address'], array('class' => 'span8', 'rows' => 6, 'label' => 'Address'));
                    echo bootstrap_form_input('phone', $user['phone'], array('class' => 'span6', 'placeholder' => 'Phone', 'label' => 'Phone'));
                    echo bootstrap_form_input('email', $user['email'], array('class' => 'span6', 'placeholder' => 'Email', 'label' => 'Email' . bootstrap_text_important()));
                    echo get_dropdown($user['user_role'], 'user_role[]', 'role_id', 'Role_model', array(
                        'label' => 'User Role',
                        'data-placeholder' => 'User Role',
                        'style' => 'width:300px',
                        'class' => 'chzn-select',
                        'tabindex' => '13',
                        'multiple' => NULL));
                    echo bootstrap_form_password('password', NULL, array('class' => 'span6', 'placeholder' => 'Password', 'label' => 'Password' . bootstrap_text_important()));
                    echo bootstrap_form_password('confirmation_password', NULL, array('class' => 'span6', 'placeholder' => 'Confirmation Password', 'label' => 'Confirmation Password' . bootstrap_text_important()));
                    echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
                    echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/user', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>