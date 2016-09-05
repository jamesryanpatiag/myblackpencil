<style tye="text/css">
    .error-mess{
        color:red;
    }
</style>


<!-- Page Content -->
<div class="panel-box">
		<div class="container">

		<div class="row" style="margin-top:100px">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <span style="color:red">
		    	</span>
                <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php }?>
                <?php if(isset($isRegistrationSuccess) && !$isRegistrationSuccess && strlen($message)>0){?>
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?php echo $message; ?> 
                </div>
                <?php }?>
				<?php echo form_open('auth/register'); ?>
					<h2>Please Sign Up <small>It's free and always will be.</small></h2>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
		                        <input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control input-lg" placeholder="First Name" tabindex="1">
                                <span class="error-mess"><?php echo form_error('first_name'); ?></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                                <span class="error-mess"><?php echo form_error('last_name'); ?></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control input-lg" value="<?php echo set_value('username'); ?>" placeholder="Username" tabindex="3">
                        <span class="error-mess"><?php echo form_error('username'); ?></span>
					</div>
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php echo set_value('email'); ?>" tabindex="4">
                        <span class="error-mess"><?php echo form_error('email'); ?></span>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                <span class="error-mess"><?php echo form_error('password'); ?></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                <span class="error-mess"><?php echo form_error('password_confirmation'); ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
                            <div class="form-group">
    							<span class="button-checkbox">
    								<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
    		                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
    							</span>
                            </div>
						</div>
						<div class="col-xs-8 col-sm-9 col-md-9">
							 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
						</div>
					</div>
					<span class="error-mess"><?php echo form_error('t_and_c'); ?></span>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
						<div class="col-xs-12 col-md-6"><a href="<?php echo site_url('auth'); ?>" class="btn btn-success btn-block btn-lg">Sign In</a></div>
					</div>
			</div>
		</div>
		<!-- Modal -->
        <?php $this->view('dashboard/modals/termsAndConditionModal'); ?>
    </div>
    <br/><br/><br/><br/><br/><br/>
	<a  name="contact"></a>
    <!-- /.banner -->

    <!-- Footer -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; My Black Pencil 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/";?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/";?>js/bootstrap.min.js"></script>
    <script>
    	$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
    </script>
</body>

</html>
