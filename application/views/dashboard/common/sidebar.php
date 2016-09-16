  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["fullname"];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($module=='dashboard'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/myDashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='pending'){echo 'active';}?>">
          <a href="<?php echo site_url('/modules/pendingClasses');?>">
            <i class="fa fa-ellipsis-h"></i>
            <span>Pending Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='initial_review'){echo 'active';}?>">
          <a href="<?php echo site_url('/modules/initialReviewClasses');?>">
            <i class="fa fa-sticky-note"></i>
            <span>Initial Review Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(STUDENT))) { ?>
        <li class="<?php if($module=='my_classes'){echo 'active';}?>">
          <a href="<?php echo site_url('/modules/myClasses');?>">
            <i class="fa fa-files-o"></i>
            <span>My Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(TUTOR, MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='batchout'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/batchoutClasses');?>">
            <i class="fa fa-reply"></i>
            <span>Batch-Out Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(TUTOR, MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='inprogress'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/inprogressClasses');?>">
            <i class="fa fa-hourglass"></i>
            <span>In-Progress Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(TUTOR, MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='completed'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/completedClasses');?>">
            <i class="fa fa-check-circle-o"></i>
            <span>Completed Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
        <li class="header">MANAGER'S PANEL</li>
        <li class="<?php if($module=='refunded'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/refundedClasses');?>">
            <i class="fa fa-mail-reply-all"></i>
            <span>Refunded Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='escalated'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/escalatedClasses');?>">
            <i class="fa fa-check-circle-o"></i>
            <span>Escalated Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <?php } ?>
        <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='consultants'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/consultants');?>">
            <i class="fa fa-users"></i>
            <span>Consultants</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(permissionChecker(array(MANAGER, ADMINISTRATOR))) { ?>
        <li class="<?php if($module=='students'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/students');?>">
            <i class="fa fa-users"></i>
            <span>Students</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>