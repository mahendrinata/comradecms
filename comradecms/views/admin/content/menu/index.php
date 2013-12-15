<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Menu Management</h5>
        <div class="widget-control pull-right">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo get_link('admin/menu/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
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
              foreach ($menus as $menu) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $menu['name']; ?></td>
                  <td><?php echo get_label_active($menu['is_active']); ?></td>
                  <td><?php echo get_label_active($menu['is_default'], array('Not Default', 'Default')); ?></td>
                  <td><span class="label label-warning"><?php echo $menu['type']['name']; ?></span></td>
                  <td><?php echo $menu['created_at']; ?></td>
                  <td><?php echo $menu['updated_at']; ?></td>
                  <td>
                    <div class="btn-group pull-right">
                      <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/menu/detail', $menu); ?>"><i class="icon-file"></i> View Details</a></li>
                        <li><a href="<?php echo get_link('admin/menu/edit', $menu); ?>"><i class="icon-edit"></i> Edit menu</a></li>
                        <li><a href="<?php echo get_link('admin/menu/remove', $menu, TRUE); ?>"><i class="icon-trash"></i> Remove menu</a></li>
                        <li><a href="<?php echo get_link('admin/menu/active', $menu, TRUE); ?>"><i class="icon-ok"></i> Set menu Status</a></li>
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