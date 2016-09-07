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
                       data-toggle="modal" data-target="#addConsultant" >
                      <span class="fa fa-plus"></span>
                      Add New Consultant</button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Consultant ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Last Login</th>  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($list) && !empty($list)){?>
                        <?php foreach($list as $item){ ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td><?php echo $item->username; ?></td>
                                <td><?php echo $item->firstname . " " . 
					        			   ($item->middlename==""?"":$item->middlename . " ") .
				        			   	   $item->surname; ?></td>
	        			   	   	<td><?php echo $item->last_login;?></td>
                                <td>
<!--                                     <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" onClick="setData('<?php echo $item->id;?>','<?php echo $item->status;?>')" data-target="#changeStatus" >
                                        <span class="fa fa-exchange"> Change Status</button> -->
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Consultant ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Last Login</th>  
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->view("dashboard/modals/notesModal"); ?>
<?php $this->view("dashboard/modals/changeStatus"); ?>
<?php $this->view("dashboard/common/jsIncludeForModal"); ?>

