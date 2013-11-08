<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>User Management</h5>
        <div class="widget-control pull-right">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>admin/user/create"><i class="icon-plus"></i> Add New</a></li>
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
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($users as $user) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $user['username']; ?></td>
                  <td><?php echo $user['first_name']; ?></td>
                  <td><?php echo $user['middle_name']; ?></td>
                  <td><?php echo $user['last_name']; ?></td>
                  <td><?php echo $user['email']; ?></td>
                  <td><?php echo $user['phone']; ?></td>
                  <td>
                    <?php
                    if ($user['is_active'])
                      echo '<span class="label label-success">Active</span>';
                    else
                      echo '<span class="label label-important">Non-Active</span>';
                    ?>
                  </td>
                  <td>
                    <?php
                    foreach ($user['user_role'] as $user_role) {
                      
                    }
                    ?>
                  </td>
                  <td>
                    <div class="btn-group pull-right">
                      <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-file"></i> View Details</a></li>
                        <li><a href="#"><i class="icon-edit"></i> Edit Post</a></li>
                        <li><a href="#"><i class="icon-trash"></i> Remove Post</a></li>
                        <li><a href="#"><i class="icon-ok"></i> Publish Post</a></li>
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