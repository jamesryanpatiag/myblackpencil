  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>BP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>My</b> Black Pencil</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["fullname"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["fullname"];?><br/><?php echo $_SESSION["role_code"];?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-primary btn-flat" title="Profile" 
                                     href="<?php echo site_url('user/userpage/profile/') . $_SESSION['user_id'];?>" >Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>