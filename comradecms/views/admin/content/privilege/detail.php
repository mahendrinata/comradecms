<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5> Privilege Detail <?php echo $privilege['name']; ?></h5>
            </div>
            <div class="widget-content">
                <div class="widget-box well form-horizontal">
                    <?php
                    $data = array(
                        array('label' => 'Slug', 'value' => $privilege['slug']),
                        array('label' => 'Name', 'value' => $privilege['name']),
                        array('label' => 'Description', 'value' => $privilege['description']),
                        array('label' => 'Class', 'value' => $privilege['class']),
                        array('label' => 'Method', 'value' => $privilege['method']),
                        array('label' => 'Created at', 'value' => $privilege['created_at']),
                        array('label' => 'Updated at', 'value' => $privilege['updated_at']),
                    );
                    echo bootstrap_table_view($data);
                    echo anchor('admin/privilege', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>