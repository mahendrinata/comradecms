<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Tag Management</h5>
        <div class="widget-control pull-right">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo get_link('admin/tag/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($tags as $tag) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $tag['name']; ?></td>
                  <td><?php echo $tag['description']; ?></td>
                  <td><?php echo get_label_active($tag['is_active']); ?></td>
                  <td>
                    <div class="btn-group pull-right">
                      <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/tag/detail', $tag); ?>"><i class="icon-file"></i> View Details</a></li>
                        <li><a href="<?php echo get_link('admin/tag/edit', $tag); ?>"><i class="icon-edit"></i> Edit tag</a></li>
                        <li><a href="<?php echo get_link('admin/tag/remove', $tag, TRUE); ?>"><i class="icon-trash"></i> Remove tag</a></li>
                        <li><a href="<?php echo get_link('admin/tag/active', $tag, TRUE); ?>"><i class="icon-ok"></i> Set tag Status</a></li>
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