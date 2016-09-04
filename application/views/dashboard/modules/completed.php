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
                                <td><?php echo getStatusByCode($item->status);?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-flat"><span class="fa fa-pencil"></span> Edit</button>
                                    <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#changeStatus" >
                                        <span class="fa fa-exchange"> Change Status</button>
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
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>

<?php $this->view("dashboard/modals/changeStatus"); ?>

<script type="text/javascript">

  function setData(value, status){
      $("#cmbChangeStatus").val(status);
      $("#classId").val(value);
  }

  $(document).ready(function(){

      $('#submitChangeStatus').click(function() {
        var form_data = {
          classId: $('#classId').val(),
          status: $('#cmbChangeStatus').val()
        };
        $.ajax({
            url: "<?php echo site_url('modules/changeStatus'); ?>",
            type: 'POST',
            data: form_data,  
            success: function(msg) {
                console.log(msg);
                if (msg == 'YES'){
                  $('#alert-msg').html('<div class="alert alert-success text-center">Status has been successfully changed!</div>');
                    clearFormData();
                    
                }else if (msg == 'NO'){
                    $('#alert-msg').html('<div class="alert alert-danger text-center">Error in changing status! Please try again later.</div>');
                }else{
                    $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                }
            }
        });
        return false;
      });

      $('#changeStatus').on('hidden.bs.modal', function () {
          location.reload();
      })
  })

</script>
