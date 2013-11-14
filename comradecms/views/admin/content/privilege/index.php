<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Role Management</h5>
        <div class="widget-control pull-right">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo get_link('admin/privilege/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
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
                <th>Description</th>
                <th>Class</th>
                <td>Method</td>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($privileges as $privilege) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $privilege['slug']; ?></td>
                  <td><?php echo $privilege['name']; ?></td>
                  <td><?php echo $privilege['description']; ?></td>
                  <td><?php echo $privilege['class']; ?></td>
                  <td><?php echo $privilege['method']; ?></td>
                  <td><?php echo $privilege['created_at']; ?></td>
                  <td><?php echo $privilege['updated_at']; ?></td>
                  <td>
                    <div class="btn-group pull-right">
                      <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/privilege/detail', $privilege); ?>"><i class="icon-file"></i> View Details</a></li>
                        <li><a href="<?php echo get_link('admin/privilege/edit', $privilege); ?>"><i class="icon-edit"></i> Edit privilege</a></li>
                        <li><a href="<?php echo get_link('admin/privilege/remove', $privilege, TRUE); ?>"><i class="icon-trash"></i> Remove privilege</a></li>
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