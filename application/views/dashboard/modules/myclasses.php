<style>
  .datepicker{z-index:1151 !important;}
</style>
<div class="wrapper">

  <?php $this->view("dashboard/common/sub-header"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->view("dashboard/common/sidebar");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Classes
        <small><?php echo $page_title;?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>/</li> <?php echo $page_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">Table List</h3>
                <div class="pull-right">
                    <button type="button" class="btn btn-block btn-primary btn-flat"
                       data-toggle="modal" data-target="#myModal" >
                      <span class="fa fa-plus"></span>
                      Add New Class</button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>  
                  <th>Type</th>  
                  <th>Start Date</th>  
                  <th>End Date</th>  
                  <th>Customer Username</th>   
                  <th>Description</th>   
                  <th>Course</th>  
                  <th>Level</th>   
                  <th>Notes</th>
                  <th>Assign to Tutor</th>
                  <th>URL</th>
                  <th>Username</th>
                  <th>Password</th> 
                  <th>Status</th>
                  <th>Actions</th> 
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($list) && !empty($list)){?>
                        <?php foreach($list as $item){ ?>
                            <tr>
                                <td><?php echo $item->id;?></td>
                                <td></td>
                                <td><?php echo $item->start_date;?></td>
                                <td><?php echo $item->end_date;?></td>
                                <td><?php echo $item->student_username;?></td>
                                <td><?php echo $item->description;?></td>
                                <td><?php echo $item->course;?></td>
                                <td><?php echo getEducationalLevelByCode($item->educational_level_code);?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $item->url;?></td>
                                <td><?php echo $item->student_username;?></td>
                                <td><?php echo $item->student_password;?></td>
                                <td><?php echo $item->status;?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-flat"><span class="fa fa-pencil"></span> Edit</button>
                                    <button type="button" class="btn btn-warning btn-flat" ><span class="fa fa-warning"></span> Refund</button>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>  
                  <th>Type</th>  
                  <th>Start Date</th>  
                  <th>End Date</th>  
                  <th>Customer Username</th>   
                  <th>Description</th>   
                  <th>Course</th>  
                  <th>Level</th>   
                  <th>Notes</th>
                  <th>Assign to Tutor</th>
                  <th>URL</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 My Black Pencil.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?php $this->view("dashboard/modals/addClassModal"); ?>

<script>
  $(function () {

    //Date picker
    $('#start_dtpicker').datepicker({
      autoclose: true
    });

    $('#end_dtpicker').datepicker({
      autoclose: true
    });
  });
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#submit').click(function() {
      var form_data = {
        student_url: $('#student_url').val(),
          student_username: $('#student_username').val(),
          student_password: $('#student_password').val(),
          student_course: $('#student_course').val(),
          student_description: $('#student_description').val(),
          start_dtpicker: $("#start_dtpicker").val(),
          end_dtpicker: $("#end_dtpicker").val(),
          student_level: $("#student_level").val()
      };
      $.ajax({
          url: "<?php echo site_url('modules/addClass'); ?>",
          type: 'POST',
          data: form_data,  
          success: function(msg) {
              console.log(msg);
              if (msg == 'YES'){
                $('#alert-msg').html('<div class="alert alert-success text-center">Class has been successfully created!</div>');
                  clearFormData();
                  
              }else if (msg == 'NO'){
                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
              }else{
                  $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
              }
          }
      });
      return false;
    });

    $('#myModal').on('hidden.bs.modal', function () {
     location.reload();
    })

    function clearFormData(){
        $('#student_url').val("");
        $('#student_username').val("");
        $('#student_password').val("");
        $('#student_course').val("");
        $('#student_description').val("");
        $("#start_dtpicker").val("");
        $("#end_dtpicker").val("");
        $("#student_level").val("");
    }
})

</script>