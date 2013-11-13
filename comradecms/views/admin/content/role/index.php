<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Role Management</h5>
        <div class="widget-control pull-right">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo get_link('admin/role/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
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
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Default</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($roles as $role) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $role['name']; ?></td>
                  <td><?php echo $role['description']; ?></td>
                  <td><?php echo get_label_active($role['is_active']); ?></td>
                  <td><?php echo get_label_active($role['is_default'], array('Not Default', 'Default')); ?></td>
                  <td>
                    <div class="btn-group pull-right">
                      <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/role/detail', $role); ?>"><i class="icon-file"></i> View Details</a></li>
                        <li><a href="<?php echo get_link('admin/role/edit', $role); ?>"><i class="icon-edit"></i> Edit role</a></li>
                        <li><a href="<?php echo get_link('admin/role/remove', $role, TRUE); ?>"><i class="icon-trash"></i> Remove role</a></li>
                        <li><a href="<?php echo get_link('admin/role/active', $role, TRUE); ?>"><i class="icon-ok"></i> Set role Status</a></li>
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