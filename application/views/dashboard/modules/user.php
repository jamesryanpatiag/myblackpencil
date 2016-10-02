<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/easy-autocomplete.min.css">
<style type="type/css">

  .easy-autocomplete-container{
    margin-top:50px;
  }

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
        <?php if(!isset($user)){ echo "Add"; }else{ echo "Edit"; }?>
        <?php if($_SESSION['role_code']==ADMINISTRATOR) { ?>
          <small>User</small>
        <?php } else { ?>
          <small><?php echo $sub_title;?></small>
        <?php } ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>/</li> <?php echo $page_title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <!-- PERSONAL DETAILS -->
        <?php if(isset($user)){ 
            echo form_open('user/editUser');
          }else{
            echo form_open('user/addUser');
          }
        ?>
          <div class="col-md-12 col-lg-12">
              <input type="submit" class="btn btn-info" value="Save Details" >
              <br/><br/>
                <?php if(isset($isSuccess) && $isSuccess == "true"){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    Account has been successfully saved.
                </div>
                <?php } ?>
          </div>
          <br/><br/><br/>
          <div class="col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Personal Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="first_name">Firstname</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Firstname" value="<?php echo set_value('first_name', isset($user) && isset($user->firstname) ? $user->firstname : ''); ?>"  >
                      <span class="error-mess"><?php echo form_error('first_name'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="middlename">Middlename</label>
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middlename" value="<?php echo set_value('middlename', isset($user) && isset($user->middlename) ? $user->middlename : ''); ?>" >
                    </div>
                    <div class="form-group">
                      <label for="last_name">Surname</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Surname" value="<?php echo set_value('last_name', isset($user) && isset($user->surname) ? $user->surname : ''); ?>" >
                      <span class="error-mess"><?php echo form_error('last_name'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="dob" class="form-control pull-right" id="dob" value="<?php echo set_value('dob', isset($user) && isset($user->dob) ? $user->dob : date('Y-m-d')); ?>">
                        </div>
                        <span class="error-mess"><?php echo form_error('dob'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <select id="gender" name="gender" class="form-control">
                          <option value="">-- Choose Gender --</option>
                          <option value="Male" <?php if(isset($user) && $user->gender=='Male'){ echo 'selected="selected"'; } ?> <?php echo set_select('gender', 'Male', false); ?> >Male</option>
                          <option value="Female" <?php if(isset($user) && $user->gender=='Female'){ echo 'selected="selected"'; } ?> <?php echo set_select('gender', 'Female', false); ?> >Female</option>
                      </select>
                    </div>

                     <div class="form-group">
                      <label for="mobileno">Mobile Number</label>
                      <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Enter Mobile No." value="<?php echo set_value('mobileno', isset($user) && isset($user->mobileno) ? $user->mobileno : ''); ?>" >
                      <span class="error-mess"><?php echo form_error('mobileno'); ?></span>
                    </div>

                  </div>
                  <!-- /.box-body -->
              </div>
          </div>

          <!-- ACCOUNT DETAILS -->
          <div class="col-md-6 col-lg-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Account Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <!-- <form role="form"> -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="hidden" id="module" name="module" value="<?php echo $sub_title; ?>" />
                      <?php if(!isset($user)){ ?>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo set_value('username'); ?>">
                      <?php } else { ?>
                          <label>: <?php echo $user->username; ?></label>
                      <?php } ?>
                      <span class="error-mess"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <?php if(!isset($user)){ ?>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo set_value('email'); ?>">
                      <?php } else { ?>
                          <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>">    
                          <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $user->username; ?>">
                          <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $user->id; ?>">    
                          <label>: <?php echo $user->email; ?></label>
                      <?php } ?>
                      <span class="error-mess"><?php echo form_error('email'); ?></span>
                    </div>  
                    <div class="form-group">
                      
                      <?php if($_SESSION['role_code']==ADMINISTRATOR){ ?>
                      <label for="role">Role</label>
                      <select type="text" class="form-control" id="role" name="role">
                          <option value="">-- Select Role --</option>
                          <option value="STUDENT" <?php if(isset($user) && $user->role=='STUDENT'){ echo 'selected="selected"'; } ?> <?php echo set_select('role', 'STUDENT'); ?> >Student</option>
                          <option value="TUTOR" <?php if(isset($user) && $user->role=='TUTOR'){ echo 'selected="selected"'; } ?> <?php echo set_select('role', 'TUTOR'); ?> >Tutor</option>
                          <option value="MANAGER" <?php if(isset($user) && $user->role=='MANAGER'){ echo 'selected="selected"'; } ?> <?php echo set_select('role', 'MANAGER'); ?> >Manager</option>
                          <option value="ADMINISTRATOR" <?php if(isset($user) && $user->role=='ADMINISTRATOR'){ echo 'selected="selected"'; } ?> <?php echo set_select('role', 'ADMINISTRATOR'); ?> >Administrator</option>
                      </select>
                      <?php } else if($_SESSION['role_code']==MANAGER && $isCurrentUser == false){ ?>
                          <label for="role">Role</label>
                          <select type="text" class="form-control" id="role" name="role">
                              <option value="">-- Select Role --</option>
                              <option value="TUTOR" <?php if(isset($user) && $user->role=='TUTOR'){ echo 'selected="selected"'; } ?> <?php echo set_select('role', 'TUTOR'); ?> >Tutor</option>
                          </select>
                      <?php } else { ?>
                          <input type="hidden" id="role" name="role" value="<?php echo $user->role; ?>" />
                      <?php } ?>
                      <span class="error-mess"><?php echo form_error('role_code'); ?></span>
                      <?php if(isset($user)){ ?>
                          <a href="<?php echo site_url('modules/changepassword/') . sha1($user->id); ?>"><i class="fa fa-key"> Change Password</i></a>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- /.box-body -->
                <!-- </form> -->
              </div>
          </div>

          <?php if(!isset($user) || $user->role == TUTOR || $user->role == ADMINISTRATOR){?>
          <div class="col-md-3 col-lg-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Expertise</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body form-inline">

                        <div class="form-group">
                            <input type="text" class="form-control" id="expertise" name="expertise" placeholder="Enter Expertise" >
                        </div>
                        <button type="button" class="btn btn-warning" id="btnExpertise">Add expertise</button>

                        <div id="allexpertise" style='padding:5px'>
                          <?php if(isset($allUserExpertise)){ 
                                foreach($allUserExpertise as $userExpertise){
                            ?>
                              <span class='badge label-primary' style='margin:2px;padding-top:10px;font-size:12px'> 
                              <label><?php echo $userExpertise->name; ?></label>
                              <label class='pull-right'><a href='#/' onclick='deleteUserExpertise("<?php echo $userExpertise->name; ?>")' style='color:white'>&nbsp;&nbsp;x</a></label>
                              <input type='hidden' class='allexpertise' name='allexpertise[]' value='<?php echo $userExpertise->name?>'/></span>


                          <?php }}?> 
                        </div>
                  </div>
                  <!-- /.box-body -->
              </div>
          </div>
          <?php }?>

        <?php echo form_close(); ?>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->view("dashboard/common/jsIncludeForModal"); ?>
<script type="text/javascript">

  function addExpertise(expertise, counter){
      return "<span class='badge label-primary' style='margin:2px;padding-top:10px;font-size:12px'>" + 
              "<label>" + expertise + "</label>" + 
              "<label class='pull-right'><a href='#/' onclick='deleteUserExpertise('" + expertise + "')' style='color:white'>&nbsp;&nbsp;x</a></label>" +
              "<input type='hidden' class='allexpertise' name='allexpertise[]' value='" + expertise + "'/>"
              "</span>";
  }

  function deleteUserExpertise(name){

      var userId = <?php echo $user->id; ?>;
      if(confirm("Are you sure you want to delete this Expertise?")){

        var form_data = {
            userId: userId,
            name: name
        };

        $.ajax({
            url: "<?php echo site_url('user/deleteUserExpertise'); ?>",
            type: 'POST',
            data: form_data,  
            success: function(msg) {
              var badges = $(".badge");
              var currBadge = badges;
              $.each(badges, function(){
                  var expertiseval = $(this).find('input');
                  if(expertiseval[0].value === name){
                      this.remove();
                  }
              });
            }
        });

      }else{

        return false;

      }
      
  }

  $(function(){

      var options = {

          url: function(phrase) {
            return "<?php echo site_url('user/getAllExpertise'); ?>";
          },

          getValue: function(element) {
            return element.name;
          },

          ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.phrase = $("#expertise").val();
            return data;
          },
          list: {
            match: {
              enabled: true
            }
          },
          requestDelay: 300
        };

        $("#expertise").easyAutocomplete(options);

        $('#btnExpertise').on("click",function(e){
          var ex = $("#expertise").val();
           if(ex==""){
              return false;
           }
           $.ajax({
              url: "<?php echo site_url('user/getAllExpertiseByUser/'); ?>" + <?php echo $user->id; ?>,
              type: 'GET',
              success: function(result) {
                  // var allexpertise = JSON.parse(result);
                  var allexpertise = document.getElementsByClassName("allexpertise");
                  var isExist = false;
                  $.each(allexpertise,function(){
                      if(ex===this.value){
                         alert("Expertise already exist on the list");
                         isExist = true;
                      }
                  });
                  if(!isExist){
                    var expertisehtml = addExpertise($("#expertise").val());
                    $("#allexpertise").append(expertisehtml);
                    $("#expertise").val("");  
                  }
                  
              },
              error: function(result){
                return "error";
              }
          });
        });

        $('#dob').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
        });
  })


function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.easy-autocomplete.js"></script>