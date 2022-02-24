<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

  



    <title>  Learning Management | Admin</title>



    <!-- Bootstrap -->

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Font Awesome -->

    <link href="<?php echo base_url();?>asset/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

    <link href="<?php echo base_url();?>asset/admin/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->

    <link href="<?php echo base_url();?>asset/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  

    <!-- bootstrap-progressbar -->

    <link href="<?php echo base_url();?>asset/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- JQVMap -->

    <link href="<?php echo base_url();?>asset/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->

    <link href="<?php echo base_url();?>asset/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Datatables -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.min.css"/>



    <!-- Custom Theme Style -->

    <link href="<?php echo base_url();?>asset/admin/build/css/custom.min.css" rel="stylesheet">

     <link href="<?php echo base_url();?>asset/admin/css/custom.css?ver=<?php echo time();?>" rel="stylesheet">



  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a href="#" class="site_title"><img src="http://simply-logic.com/Training-Videos/asset/img/logo.png"  class=""></a>

            </div>



            <div class="clearfix"></div>



            <!-- menu profile quick info -->

            <div class="profile clearfix">

              <div class="profile_pic">

                

              </div>

              <div class="profile_info">

                

                <h2>Welcome</h2>

              </div>

            </div>

            <!-- /menu profile quick info -->



            <br />



            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                

                <ul class="nav side-menu">
                  <?php 

                   $acc_type=$this->session->userdata('acc_type');
                   if(($acc_type=='Super Admin') || ($acc_type == 'All Access'))
                   {
                    ?>
                      <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i>Dashboard

                  </a></li>

                   <li><a href="<?php echo base_url('admin/client');?>"><i class="fa fa-edit"></i> Ambassador </a>

                    

                  </li>

                 

                 

                  

                  <li><a href="<?php echo base_url('admin/videos');?>"><i class="fa fa-clone"></i>Videos </a>

                  </li>
                
                  <li><a href="<?php echo base_url('admin/all_content');?>"><i class="fa fa-clone"></i>Ambassador Education </a>

</li>
<li><a href="<?php echo base_url('admin/category');?>"><i class="fa fa-clone"></i>Categories </a>

</li>
<li><a href="<?php echo base_url('admin/media');?>"><i class="fa fa-clone"></i>Media </a>

</li>
                   <li><a href="<?php echo base_url('admin/quiz');?>"><i class="fa fa-edit"></i>Quiz </a>

                    

                  </li>

                 

                      

                  <li><a href="<?php echo base_url('admin/users');?>"><i class="fa fa-users"></i>Users </a>

                 

                   

                  </li>

                    <?php
                  }
                 
                         else if($acc_type=='Retail')
                   {
                    ?>
                      <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i>Dashboard

                  </a></li>

                   <li><a href="<?php echo base_url('admin/client');?>"><i class="fa fa-edit"></i> Ambassador </a>

                    

                  </li>

                 

                 

                  

                

                 

                   

                  </li>

                    <?php
                  }
                  else if($acc_type=='Video')
                  {
                    ?>
                     <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i>Dashboard

                  </a></li>
                      <li><a href="<?php echo base_url('admin/videos');?>"><i class="fa fa-clone"></i>Videos </a>

                  </li>


                 

                      

               
                    <?php
                  }
                  else if($acc_type=='Quiz')
                  {
                    ?>
                     <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i>Dashboard

                  </a></li>

                   <li><a href="<?php echo base_url('admin/quiz');?>"><i class="fa fa-edit"></i>Quiz </a>

                    

                  </li>

                    <?php
                  }
                  else
                  {

                  }
                  ?>

               

                </ul>

              </div>

            



            </div>

            <!-- /sidebar menu -->



            <!-- /menu footer buttons -->

     

            <!-- /menu footer buttons -->

          </div>

        </div>



        <!-- top navigation -->

        <div class="top_nav">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>



              <ul class="nav navbar-nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    Admin

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                   

                    <li><a href="<?php echo base_url('admin/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                  </ul>

                </li>



                <li role="presentation" class="dropdown">

                

                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    <li>

                      <a>

                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>

                        <span>

                          <span>Admin</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>

                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>

                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>

                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>

                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>

                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>

                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <div class="text-center">

                        <a>

                          <strong>See All Alerts</strong>

                          <i class="fa fa-angle-right"></i>

                        </a>

                      </div>

                    </li>

                  </ul>

                </li>

              </ul>

            </nav>

          </div>

        </div>

        <!-- /top navigation -->



<!-- main content -->



   <!-- Main content start -->

      <?php

  

         echo $contents;



      ?>

      <!--main content End-->



<!-- main content end -->

        <!-- footer content -->

        <footer>

          <div class="pull-right">

           Copyright

          </div>

          <div class="clearfix"></div>

        </footer>

        <!-- /footer content -->

      </div>

    </div>



    <!-- jQuery -->

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>



    <!-- Bootstrap -->

   <!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>



<!-- Latest compiled JavaScript -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

   

 

    <!-- Chart.js -->

    <script src="<?php echo base_url();?>asset/admin/vendors/Chart.js/dist/Chart.min.js"></script>

    

    <!-- bootstrap-progressbar -->

    <script src="<?php echo base_url();?>asset/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

 

  

    <script type='text/javascript'>

        var baseURL= "<?php echo site_url();?>";

         var csrf_token = '<?php echo $this->security->get_csrf_hash()?>';

    

        

        </script>



    <!-- Custom Theme Scripts -->

     

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.js"></script>

    <script src="<?php echo base_url();?>asset/admin/build/js/custom.min.js"></script>

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


  </body>

</html>

