<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5> User Detail <?php echo $user['username']; ?></h5>
            </div>
            <div class="widget-content">
                <div class="widget-box well form-horizontal">
                    <?php
                    $data = array(
                        array('label' => 'Username', 'value' => $user['username']),
                        array('label' => 'First Name', 'value' => $user['first_name']),
                        array('label' => 'Middle Name', 'value' => $user['middle_name']),
                        array('label' => 'Last Name', 'value' => $user['last_name']),
                        array('label' => 'Email', 'value' => $user['email']),
                        array('label' => 'Phone', 'value' => $user['phone']),
                        array('label' => 'Address', 'value' => $user['address']),
                        array('label' => 'Created at', 'value' => $user['created_at']),
                        array('label' => 'Updated at', 'value' => $user['updated_at']),
                    );
                    echo bootstrap_table_view($data);
                    anchor('admin/user', 'Back', 'class="btn btn-danger btn-link-bootstrap"')
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>