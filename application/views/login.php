<div class="colorlib-loader"></div>

<div class="col-md-6 col-md-offset-3">
	<div class="contact-wrap">
        <center><h3>Login</h3></center>
        <?php echo form_open('Auth/login_process',''); ?>
			<div class="row form-group">
				<div class="col-md-12">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Your email address" required>
                </div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<label for="subject">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Your password" required>
                </div>
            </div>
            
			<div class="form-group text-center">
				<input type="submit" value="Log in" class="btn btn-success">
			</div>
        <?php echo form_close(); ?>	
        <center>
            Don't have an account? <?php echo anchor('Auth/register','Sign up'); ?>
        </center>
	</div>
</div>