<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Language Management</h5>
        <div class="widget-control pull-right">
          <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo get_link('admin/language/create'); ?>"><i class="icon-plus"></i> Add New</a></li>
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
                <th>Status</th>
                <th>Default</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($languages as $language) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $language['slug']; ?></td>
                  <td><?php echo $language['name']; ?></td>
                  <td><?php echo get_label_active($language['is_active']); ?></td>
                  <td><?php echo get_label_active($language['is_default'], array('Not Default', 'Default')); ?></td>
                  <td><?php echo $language['created_at']; ?></td>
                  <td><?php echo $language['updated_at']; ?></td>
                  <td>
                    <div class="btn-group pull-right">
                      <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo get_link('admin/language/detail', $language); ?>"><i class="icon-file"></i> View Details</a></li>
                        <li><a href="<?php echo get_link('admin/language/edit', $language); ?>"><i class="icon-edit"></i> Edit language</a></li>
                        <li><a href="<?php echo get_link('admin/language/remove', $language, TRUE); ?>"><i class="icon-trash"></i> Remove language</a></li>
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