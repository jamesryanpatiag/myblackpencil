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
                  <th>Refunded Date</th>  
                  <th>Assignment ID</th>  
                  <th>Tutor</th>  
                  <th>Customer</th>  
                  <th>Type</th>   
                  <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($list) && !empty($list)){?>
                        <?php foreach($list as $item){ ?>
                        <?php }?>
                    <?php }?>
                </tbody>
                <tfoot>
                <tr>
					<th>Refunded Date</th>  
					<th>Assignment ID</th>  
					<th>Tutor</th>  
					<th>Customer</th>  
					<th>Type</th>   
					<th>Notes</th>
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
<?php $this->view("dashboard/modals/notesModal"); ?>
<?php $this->view("dashboard/modals/changeStatus"); ?>
<?php $this->view("dashboard/modals/assignTutorModal"); ?>
<?php $this->view("dashboard/common/jsIncludeForModal"); ?>
