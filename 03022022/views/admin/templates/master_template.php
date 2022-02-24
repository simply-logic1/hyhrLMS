<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HYHR Learning Platform">
    <meta name="author" content="HYHR">

    <title>HYHR | Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('asset/admin_new/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('asset/admin_new/css/sb-admin-2.min.css');?>" rel="stylesheet">
    
    <link href="<?php echo base_url();?>asset/admin/css/custom.css?ver=<?php echo time();?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

                <div class="sidebar-brand-text mx-3"> <a href="#" class="site_title"><img src="http://simply-logic.com/Training-Videos/asset/img/logo.png"  class=""></a>
 </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link"  href="<?php echo base_url('admin/dashboard');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('admin/client');?>" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-users"></i>
                    <span>Ambassadors</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         
                        <a class="collapse-item" href="<?php echo base_url('admin/client');?>"> All Ambassadors</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/add_partner');?>">Add Ambassadors</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('admin/videos');?>" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-play-circle"></i>
                    <span>Videos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="<?php echo base_url('admin/videos');?>">All Videos</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/upload');?>">Add Videos</a>
                        
                    </div>
                </div>
            </li>

           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"  href="<?php echo base_url('admin/all_content');?>" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Ambassador Education</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       
                        <a class="collapse-item" href="<?php echo base_url('admin/all_content');?>">All Education</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/content');?>">Add Education</a>
                      
                         
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link"  href="<?php echo base_url('admin/category');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Categories</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/media');?>">
                    <i class="fas fa-image"></i>
                    <span>Media</span></a>
            </li>
 <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/quiz');?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Quiz</span></a>
            </li>
			 <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/users');?>">
                <i class="fas fa-users"></i>
                    <span>Users</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
 
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            

            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                    <i class="	fas fa-angle-down"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    
                    <a href="<?php echo base_url('admin/logout');?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

       <?php

  

         echo $contents;



      ?>
      

</div>
<!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                       <!-- <span>Copyright &copy; Your Website 2021</span>-->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('asset/admin_new/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('asset/admin_new/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('asset/admin_new/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('asset/admin_new/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('asset/admin_new/vendor/chart.js/Chart.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('asset/admin_new/js/demo/chart-area-demo.js');?>"></script>
    <script src="<?php echo base_url('asset/admin_new/js/demo/chart-pie-demo.js');?>"></script>

    <footer>
    <script type='text/javascript'>

var baseURL= "<?php echo site_url();?>";

 var csrf_token = '<?php echo $this->security->get_csrf_hash()?>';





</script>

<!-- Latest compiled JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    
    <script src="<?php echo base_url();?>asset/admin/build/js/custom.min.js"></script>
     <!-- bootstrap-daterangepicker -->

     <link href="<?php echo base_url();?>asset/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
     <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.js"></script>

<!-- Datatables -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.min.css"/>

      <script src="<?php echo base_url();?>asset/admin/js/custom.js?ver=<?php echo time();?>"></script>
     

      <style>
  
/* For other boilerplate styles, see: /docs/general-configuration-guide/boilerplate-content-css/ */
/*
* For rendering images inserted using the image plugin.
* Includes image captions using the HTML5 figure element.
*/
.tox-notifications-container {
    display: none;
}
span.tox-statusbar__branding {
    display: none;
}
figure.image {
  display: inline-block;
  border: 1px solid gray;
  margin: 0 2px 0 1px;
  background: #f5f2f0;
}

figure.align-left {
  float: left;
}

figure.align-right {
  float: right;
}

figure.image img {
  margin: 8px 8px 0 8px;
}

figure.image figcaption {
  margin: 6px 8px 6px 8px;
  text-align: center;
}


/*
 Alignment using classes rather than inline styles
 check out the "formats" option
*/

img.align-left {
  float: left;
}

img.align-right {
  float: right;
}

/* Basic styles for Table of Contents plugin (toc) */
.mce-toc {
  border: 1px solid gray;
}

.mce-toc h2 {
  margin: 4px;
}

.mce-toc li {
  list-style-type: none;
}


  </style>
      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
      <script src="<?php echo base_url();?>asset/admin/js/editor.js?ver=<?php echo time();?>"></script>
    </footer>

</body>

</html>


  