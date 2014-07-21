<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5> Role Detail <?php echo $role['name']; ?></h5>
            </div>
            <div class="widget-content">
                <div class="widget-box well form-horizontal">
                    <?php
                    $data = array(
                        array('label' => 'Name', 'value' => $role['name']),
                        array('label' => 'Description', 'value' => $role['description']),
                        array('label' => 'Created at', 'value' => $role['created_at']),
                        array('label' => 'Updated at', 'value' => $role['updated_at']),
                    );
                    echo bootstrap_table_view($data);
                    echo anchor('admin/role', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>