<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5>Content Management</h5>
                <div class="widget-control pull-right">
                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/content/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
                        <!--<li><a href="#"><i class="icon-ok"></i> Bulk Approved</a></li>-->
                        <!--<li><a href="#"><i class="icon-minus-sign"></i> Bulk Remove</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="widget-content">
                <div class="widget-box">
                    <table class="data-tbl-tools table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Tag</th>
                                <th>Read by</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($contents as $content) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $content['content_detail'][0]['title']; ?></td>
                                    <td><?php echo get_label_dropdown($content['content_type'], 'type_id', $types); ?></td>
                                    <td><?php echo get_label_dropdown($content['content_tag'], 'tag_id', $tags); ?></td>
                                    <td><?php echo $content['counter']; ?></td>
                                    <td><?php echo get_label_active($content['is_active']); ?></td>
                                    <td><?php echo $content['created_at']; ?></td>
                                    <td><?php echo $content['updated_at']; ?></td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                                            <ul class="dropdown-menu"> 
                                                <li><a href="<?php echo get_link('admin/content/detail', $content); ?>"><i class="icon-file"></i> View Details</a></li>
                                                <li><a href="<?php echo get_link('admin/content/edit', $content); ?>"><i class="icon-edit"></i> Edit content</a></li>
                                                <li><a href="<?php echo get_link('admin/content/remove', $content, TRUE); ?>"><i class="icon-trash"></i> Remove content</a></li>
                                                <li><a href="<?php echo get_link('admin/content/active', $content, TRUE); ?>"><i class="icon-ok"></i> Set content Status</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>