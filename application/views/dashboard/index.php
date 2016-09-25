<div class="wrapper">

  <?php $this->view("dashboard/common/sub-header"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->view("dashboard/common/sidebar");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    <input type="hidden" value="<?php if(isset($is_password_changed)){ echo $is_password_changed; }else{ echo ""; } ?>" id="is_password_changed" name="is_password_changed" >
    <input type="hidden" value="<?php if(isset($isFromLogin)){ echo true; }else{ echo false; } ?>" id="is_from_login" name="is_from_login" >
    <!-- Main content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->view("dashboard/modals/forcechangepassword"); ?>
<script type="text/javascript">
    $(window).load(function(){

        showForceChangePassword();

        function showForceChangePassword(){
            var is_password_changed = $("#is_password_changed").val();
            var is_from_login = $("#is_from_login").val();
            if(is_password_changed==0 && is_from_login){
              $('#forceChangePassword').modal({
                  backdrop: 'static',
                  keyboard: false
              })
               $('#forceChangePassword').modal('show');
            }
        }

        $("#submitForceChangePassword").on("click", function(){

            var form_data = new FormData();
            form_data.append("new_password", $("#new_password").val());
            form_data.append("retype_password", $("#retype_password").val());

            $.ajax({
              url: "<?php echo site_url('auth/forceChangePassword/'); ?>",
              type: 'POST',
              data: form_data,
              cache: false,
              dataType: 'text', 
              processData: false,
              contentType: false, 
              success: function(result) {
                console.log(result);
                if(result==='YES'){
                  $("#edit-alert-msg").html("Password has been successfully changed");  
                  $("#edit-alert-msg").addClass("alert alert-success");
                  $("#forceChangePasswordCloseBtn").css("display","inline");
                }else{
                  var resultData = JSON.parse(result);
                  $("#edit-alert-msg").html(resultData);  
                  $("#edit-alert-msg").addClass("alert alert-danger");
                }
              }
            });

        });


    });
</script>

