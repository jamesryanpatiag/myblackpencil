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
    <section class="content" id="page_content">
      <input type="hidden" id="classStatus" value="INITIAL-REVIEW" />
            
            <?php $this->view("dashboard/tables/tutorClassesTables", $list); ?>
            
    </section>
    <!-- /.content -->
  </div>
  <?php $this->view("dashboard/common/footer-html"); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->view("dashboard/modals/custCredentialModal"); ?>
<?php $this->view("dashboard/modals/notesModal"); ?>
<?php $this->view("dashboard/modals/changeStatus"); ?>
<?php $this->view("dashboard/modals/assignTutorModal"); ?>
<?php $this->view("dashboard/common/jsIncludeForModal"); ?>