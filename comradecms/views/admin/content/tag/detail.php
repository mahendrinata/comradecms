<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5> Tag Detail <?php echo $tag['name']; ?></h5>
            </div>
            <div class="widget-content">
                <div class="widget-box well form-horizontal">
                    <?php
                    $data = array(
                        array('label' => 'Name', 'value' => $tag['name']),
                        array('label' => 'Description', 'value' => $tag['description']),
                        array('label' => 'Created at', 'value' => $tag['created_at']),
                        array('label' => 'Updated at', 'value' => $tag['updated_at']),
                    );
                    echo bootstrap_table_view($data);
                    echo anchor('admin/tag', 'Back', 'class="btn btn-danger btn-link-bootstrap"');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>