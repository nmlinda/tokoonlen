<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage user
    </h1>
    <ol class="breadcrumb">
      <li><?php echo anchor('','<i class="fa fa-dashboard"></i> Home'); ?></li>
      <li class="active">Manage User</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <!-- <div class="row">
                  <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                      <label>Show 
                        <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                          <option value="10">10</option><option value="25">25</option>
                          <option value="50">50</option><option value="100">100</option>
                        </select>
                         entries
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter">
                      <label>Search:
                        <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                      </label>
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <?php echo form_error('email'); ?>
                <tr role="row">
                  <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;">
                    No
                  </th>
                  <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 207px;">
                    Email
                  </th>
                  <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 184px;">
                    Name
                  </th>
                  <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 20px;">
                    Options
                  </th>
                </tr>
                </thead>
                <tbody>
                
                  <?php
                    $no = 1;
                    foreach($users as $user){
                    ?>
                      <tr role="row" class="odd">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $user['id']; ?>">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $user['id']; ?>">
                              <i class="fa fa-trash"></i>
                            </button>
                            <!-- .modal delete -->
                          <div class="modal fade" id="modal-delete<?php echo $user['id']; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title">Delete user</h4>
                                  </div>
                                  <div class="modal-body">
                                        Are you sure want to delete this user?
                                      <div class="callout callout-danger">
                                        <p>
                                          <?php echo $user['email']; ?><br>
                                          <?php echo $user['name']; ?>
                                        </p>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                  <?php echo form_open('user/delete/'.$user['id']); ?>
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                                      <button type="submit" class="btn btn-danger">Yes</button>
                                    <?php echo form_close(); ?>	
                                  </div>
                              </div>
                                  <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>

                            <!--/.modal edit -->
                            <div class="modal fade" id="modal-edit<?php echo $user['id']; ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit User</h4>
                                  </div>
                                  <div class="modal-body">
                                    
                                    <?php echo form_open('user/update/'.$user['id'], 'class=form-horizontal'); ?>
                                    <div class="box-body">
                                      <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                          <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" placeholder="Your name" required autofocus>
                                        </div>
                                      </div>
              
                                      <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                        
                                        <div class="col-sm-10">
                                          <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" placeholder="Your email" required autofocus>
                                          
                                        </div>
                                      </div>

                                    </div>
	                                  <!-- /.box-body -->
                                    <div class="box-footer">
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-info pull-right">Submit</button>
                                    </div>
                                    <!-- /.box-footer -->
                                    <?php echo form_close(); ?>	
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            
                          
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                  ?>                   

                </tbody>
                
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
              <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  