<div class="row-fluid">
    <div class="span12">
        <div class="widget-block">
            <div class="widget-head">
                <h5>Setting Management</h5>
                <div class="widget-control pull-right">
                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/setting/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
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
                                <th>Slug</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Default</th>
                                <th>Type</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($settings as $setting) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $setting['slug']; ?></td>
                                    <td><?php echo $setting['name']; ?></td>
                                    <td><?php echo $setting['value']; ?></td>
                                    <td><?php echo $setting['priority']; ?></td>
                                    <td><?php echo get_label_active($setting['is_active']); ?></td>
                                    <td><?php echo get_label_active($setting['is_default'], array('Not Default', 'Default')); ?></td>
                                    <td><span class="label label-warning"><?php echo $setting['type']['name']; ?></span></td>
                                    <td><?php echo $setting['created_at']; ?></td>
                                    <td><?php echo $setting['updated_at']; ?></td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo get_link('admin/setting/detail', $setting); ?>"><i class="icon-file"></i> View Details</a></li>
                                                <li><a href="<?php echo get_link('admin/setting/edit', $setting); ?>"><i class="icon-edit"></i> Edit setting</a></li>
                                                <li><a href="<?php echo get_link('admin/setting/remove', $setting, TRUE); ?>"><i class="icon-trash"></i> Remove setting</a></li>
                                                <li><a href="<?php echo get_link('admin/setting/active', $setting, TRUE); ?>"><i class="icon-ok"></i> Set setting Status</a></li>
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