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
                  <!-- <th>Customer Username</th>    -->
                  <th>Description</th>   
                  <th>Course</th>  
                  <th>Level</th>   
                  <th>Notes</th>
                  <th>Tutor</th>
<!--                   <th>URL</th>
                  <th>Username</th>
                  <th>Password</th>  -->
                  <th>Status</th>
                  <th>Actions</th> 
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($list) && !empty($list)){?>
                        <?php foreach($list as $item){ ?>
                            <tr>
                                <td><?php echo $item->id;?></td>
                                <td><?php echo getTypeByCode($item->type); ?></td>
                                <td><?php echo $item->start_date;?></td>
                                <td><?php echo $item->end_date;?></td>
                                <!-- <td><?php echo $item->student_username;?></td> -->
                                <td><?php echo $item->description;?></td>
                                <td><?php echo $item->course;?></td>
                                <td><?php echo getEducationalLevelByCode($item->educational_level_code);?></td>
                                <td><a type="button" class="label label-primary" onClick="setNotesData('<?php echo $item->id;?>')" title="Add Notes" data-toggle="modal" data-target="#notes" >
                                        Add Notes</a></td>
                                <td><?php echo getUsernameById($item->tutor_id);?></td>
                                <!-- <td><?php echo $item->url;?></td>
                                <td><?php echo $item->student_username;?></td>
                                <td><?php echo $item->student_password;?></td> -->
                                <td><?php echo getStatusByCode($item->status);?></td>
                                <td>
                                    <?php if(permissionChecker(array(TUTOR, MANAGER, ADMINISTRATOR))) { ?>
                                    <button type="button" class="btn btn-warning btn-flat" title="Change Status" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#changeStatus" >
                                        <span class="fa fa-exchange"></button>
                                    <?php } ?>
                                    <?php if(permissionChecker(array(STUDENT, MANAGER, ADMINISTRATOR))) { ?>
                                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" title="Edit" onClick="setDataClass('<?php echo $item->id;?>')" data-target="#editClass" >
                                        <span class="fa fa-pencil"></button>
                                    <?php } ?>
                                     <?php if(permissionChecker(array(STUDENT, MANAGER, ADMINISTRATOR))) { ?>
                                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" title="Edit" onClick="setUploadClassId('<?php echo $item->id;?>')" data-target="#uploadFile" >
                                        <span class="fa fa-upload"></button>

                                          
                                    <?php } ?>
                                    <?php if(permissionChecker(array(STUDENT))) { ?>
                                    <button type="button"
                                        data-toggle="modal" 
                                        onClick="setRefundClassData('<?php echo $item->id;?>')" 
                                        data-target="#refundClass" 
                                        class="btn btn-danger btn-flat" title="Refund/Cancel Class"><span class="fa fa-warning"></span></button>
                                    <?php } ?>
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
                  <!-- <th>Customer Username</th>    -->
                  <th>Description</th>   
                  <th>Course</th>  
                  <th>Level</th>   
                  <th>Notes</th>
                  <th>Tutor</th>
                  <!-- <th>URL</th>
                  <th>Username</th>
                  <th>Password</th> -->
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

  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->view("dashboard/modals/uploadFileModal"); ?>
<?php $this->view("dashboard/modals/refundModal"); ?>
<?php $this->view("dashboard/modals/changeStatus"); ?>
<?php $this->view("dashboard/modals/notesModal"); ?>
<?php $this->view("dashboard/modals/addClassModal"); ?>
<?php $this->view("dashboard/modals/editClassModal"); ?>
<?php $this->view("dashboard/common/jsIncludeForModal"); ?>
<script>
  $(function () {

    //Date picker
    $('#start_dtpicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#end_dtpicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#edit_start_dtpicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#edit_end_dtpicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
  });
</script>

<script type="text/javascript">

function setDataClass(id){
  var form_data = {
      id: id
  }
  $.ajax({
        url: "<?php echo site_url('modules/getClassById'); ?>",
        type: 'POST',
        data: form_data,  
        success: function(msg) {
          var result = JSON.parse(msg);
          $('#edit_id').val(result["class"]["id"]);
          $("#edit_student_url").val(result["class"]["url"]);
          $("#edit_type").val(result["class"]["type"]);
          $('#edit_student_username').val(result["class"]["student_username"]);
          $('#edit_student_password').val(result["class"]["student_password"]);
          $('#edit_student_course').val(result["class"]["course"]);
          $('#edit_student_description').val(result["class"]["description"]);
          $("#edit_start_dtpicker").val(result["class"]["start_date"]);
          $("#edit_end_dtpicker").val(result["class"]["end_date"]);
          $("#edit_student_level").val(result["class"]["educational_level_code"]);

          $.each(result["files"], function(){
                $("#table_class_uploaded").append(uploadedFileDataRow(this));                
          });
        }
    });
}

function uploadedFileDataRow(item){
    return "<tr id='uploaded_file_" + item.id + "'>" + 
              "<td>-</td>" +
              "<td>" + item.filename + "</td>" +
              "<td>" + 
                  "<a href='<?php echo site_url('modules/downloadFileById/'); ?>" + item.id + "'  ><i class='fa fa-download'></i></a>&nbsp;&nbsp;&nbsp;" + 
                  "<a href='#' onclick='return confirm_delete(" + item.id + ")'><i class='fa fa-trash'></i></a>" + 
              "</td>" +
              "</tr>";
}

function confirm_delete(id){

  if(confirm("Are you sure you want to delete this item?")){
      $.ajax({
          url: "<?php echo site_url('modules/deleteUploadedFile/'); ?>" + id,
          type: 'GET', 
          success: function(msg) {
              if (msg == 'YES'){
                  $('#edit-alert-msg').html('<div class="alert alert-success text-center">File has been successfully deleted</div>');
              }else{
                  $('#edit-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
              }
              $("#uploaded_file_" + id).remove();
          }
      });
  }

}

$(document).ready(function(){


    $('#submitAddClass').click(function() {
      
      var fd = new FormData();
      fd.append("student_url", $('#student_url').val());
      fd.append("type", $('#type').val());
      fd.append("student_username", $('#student_username').val());
      fd.append("student_password", $('#student_password').val());
      fd.append("student_course", $('#student_course').val());
      fd.append("student_description", $('#student_description').val());
      fd.append("start_dtpicker", $("#start_dtpicker").val());
      fd.append("end_dtpicker", $("#end_dtpicker").val());
      fd.append("student_level", $("#student_level").val());
      
      $.ajax({
          url: "<?php echo site_url('modules/addClass'); ?>",
          type: 'POST',
          data: fd,  
          processData: false,
          contentType: false,
          success: function(msg) {
              if (msg == 'YES'){
                $('#alert-msg').html('<div class="alert alert-success text-center">Class has been successfully created!</div>');
                  clearFormData('');
                  
              }else if (msg == 'NO'){
                  $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
              }else{
                  $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
              }
          }
      });
      return false;
    });

    $('#submitEditClass').click(function() {
      var form_data = {
          id: $('#edit_id').val(),
          student_url: $('#edit_student_url').val(),
          type: $('#edit_type').val(),
          student_username: $('#edit_student_username').val(),
          student_password: $('#edit_student_password').val(),
          student_course: $('#edit_student_course').val(),
          student_description: $('#edit_student_description').val(),
          start_dtpicker: $("#edit_start_dtpicker").val(),
          end_dtpicker: $("#edit_end_dtpicker").val(),
          student_level: $("#edit_student_level").val()
      };
      $.ajax({
          url: "<?php echo site_url('modules/editClass'); ?>",
          type: 'POST',
          data: form_data,  
          success: function(msg) {
              if (msg == 'YES'){
                $('#edit-alert-msg').html('<div class="alert alert-success text-center">Class has been successfully updated!</div>');
              }else if (msg == 'NO'){
                  $('#edit-alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
              }else{
                  $('#edit-alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
              }
          }
      });
      return false;
    });

    $('#myModal').on('hidden.bs.modal', function () {
        location.reload();
    })

    $('#editClass').on('hidden.bs.modal', function () {
        location.reload();
    })

    function clearFormData(suffix){
        $("#" + suffix + "type").val("");
        $("#" + suffix + "student_url").val("");
        $("#" + suffix + "student_username").val("");
        $("#" + suffix + "student_password").val("");
        $("#" + suffix + "student_course").val("");
        $("#" + suffix + "student_description").val("");
        $("#" + suffix + "start_dtpicker").val("");
        $("#" + suffix + "end_dtpicker").val("");
        $("#" + suffix + "student_level").val("");
    }
})

</script>