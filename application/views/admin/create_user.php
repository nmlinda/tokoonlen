<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create user
    </h1>
    <ol class="breadcrumb">
      <li><?php echo anchor('','<i class="fa fa-dashboard"></i> Home'); ?></li>
      <li class="active">Create User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
  
      <div class="col-md-8 col-md-offset-2">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Create member</h3>
          </div>
          <!-- /.box-header -->
            
          <!-- form start -->
          <?php echo form_open('user/create', 'class=form-horizontal'); ?>
          <div class="box-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Name</label>
            
              <div class="col-sm-10">
                <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Your name" required autofocus>
              </div>
            </div>
              
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Your email" required autofocus>
                <?php echo form_error('email'); ?>
              </div>
            </div>
			
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Your password" required autofocus>
                <?php echo form_error('password'); ?>
              </div>
            </div>
          </div>
			    <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Submit</button>
          </div>
          <!-- /.box-footer -->
        <?php echo form_close(); ?>	
        
        </div>
        <!-- /.box -->
      </div>
    
    </div>
  </section>
  <!-- /.Main content -->
</div>
