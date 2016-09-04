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
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($module=='dashboard'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/myDashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($module=='pending'){echo 'active';}?>">
          <a href="<?php echo site_url('/modules/pendingClasses');?>">
            <i class="fa fa-ellipsis-h"></i>
            <span>Pending Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($module=='my_classes'){echo 'active';}?>">
          <a href="<?php echo site_url('/modules/myClasses');?>">
            <i class="fa fa-files-o"></i>
            <span>My Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($module=='batchout'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/batchoutClasses');?>">
            <i class="fa fa-reply"></i>
            <span>Batch-Out Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($module=='inprogress'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/inprogressClasses');?>">
            <i class="fa fa-hourglass-2"></i>
            <span>In-Progress Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="<?php if($module=='completed'){echo 'active';}?> treeview">
          <a href="<?php echo site_url('/modules/completedClasses');?>">
            <i class="fa fa-check-circle-o"></i>
            <span>Completed Classes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>