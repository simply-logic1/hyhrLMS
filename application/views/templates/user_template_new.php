<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" />
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.min.css"/>
  </head>
  <body>
    <div class="container-scroller">
    
<?php

$user_id=$this->session->userdata('user_unique_id');

 $user_name=$this->session->userdata('user_name');

 $user_type=$this->session->userdata('user_type');
   $comp_name=$this->session->userdata('company_name');

?>
      
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo base_url();?>asset/img/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <!--  <div class="nav-profile-img">
              <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>-->
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $user_name;?>< /p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                
                <a class="dropdown-item" href="<?php echo base_url('logout');?>">>
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            
           
           
           
          
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
           
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('library/');?>">>
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('library-list');?>" >
                <span class="menu-title">Training Videos</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('education');?>" >
                <span class="menu-title">Ambassador Education</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('document');?>" >
                <span class="menu-title">Document </span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('library/quiz_result/'.$user_id);?>" >
                <span class="menu-title">Quiz Result </span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           
     
          </ul>
        </nav>
        <!-- partial -->
  
      <!-- Main content start -->

      <?php

  

         echo $contents;



      ?>

      <!--main content End-->
	  
	  
	  
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script type='text/javascript'>

var baseURL= "<?php echo site_url();?>";

 var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';

</script>
    <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url();?>assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/todolist.js"></script>
    <script src="<?php echo base_url();?>asset/user/js/question.js?ver=<?php echo time();?>" ></script>
    
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.js"></script>







<script src="<?php echo base_url();?>asset/user/js/custom.js?ver=<?php echo time();?>"></script>

<script src="<?php echo base_url();?>asset/user/js/video_script.js?ver=<?php echo time();?>"></script>

    <!-- End custom js for this page -->
  </body>
</html>