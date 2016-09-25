<div class="wrapper">
  <?php $this->view("dashboard/common/sub-header"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->view("dashboard/common/sidebar");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
      	Edit
        <small><?php echo $page_title;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>/</li> <?php echo $page_title;?></li>
      </ol> -->

      <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="		">
        	<?php
            echo form_open('auth/changepassword/');
        	?>
          <div class="col-md-12 col-lg-12">
              <input type="submit" class="btn btn-info" value="Save Password" >
              <br/><br/>
                <?php if(isset($isSuccess) && $isSuccess == "true"){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    <?php if(isset($message) && $message != ""){ echo $message; }?>
                </div>
                <?php } ?>
          </div>
          <br/><br/><br/>
          <div class="col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="old_password">Old Password</label>
                      <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" value=""  >
                      <span class="error-mess"><?php echo form_error('old_password'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="new_password">New Password</label>
                      <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" value="" >
                      <span class="error-mess"><?php echo form_error('new_password'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="retype_password">Re-Type New Password</label>
                      <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Re-Type Password" value="" >
                      <span class="error-mess"><?php echo form_error('retype_password'); ?></span>
                    </div>
                    <input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>" />
                  </div>
                  <!-- /.box-body -->
              </div>
          </div>
        <?php echo form_close(); ?>

        </div>
      </div>
    </section>
    <!-- /.content -->

    </section>
  </div>
  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
