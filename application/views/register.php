<div class="colorlib-loader"></div>

<div class="col-md-6 col-md-offset-3">
	<div class="contact-wrap">
		<center><h3>Register</h3></center>
		<form action="<?php echo site_url('Auth/regist'); ?>" method="POST">
			<div class="row form-group">
				<div class="col-md-12">
					<label for="name">Name</label>
					<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Your name" required autofocus>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<label for="email">Email</label>
					<input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Your email address" required>
                    <?php echo form_error('email'); ?>
                </div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<label for="subject">Password</label>
					<input type="password" name="password"value="<?php echo set_value('password'); ?>"  class="form-control" placeholder="Your password" required>
                    <?php echo form_error('password'); ?>
                </div>
            </div>
            
			<div class="form-group text-center">
				<input type="submit" value="Submit" class="btn btn-success">
			</div>
        </form>		
        <center>
            Already have an account? <?php echo anchor('Auth/login','Log in'); ?>
        </center>
	</div>
</div>