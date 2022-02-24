<!doctype html>

<html class="no-js" lang="en">

<?php

 $user_id=$this->session->userdata('user_unique_id');

  $user_name=$this->session->userdata('user_name');

  $user_type=$this->session->userdata('user_type');
    $comp_name=$this->session->userdata('company_name');

?>

<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Learning Management</title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon

        ============================================ -->

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Google Fonts

        ============================================ -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

    <!-- Bootstrap CSS

        ============================================ -->

     <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/bootstrap.min.css">

    <!-- Bootstrap CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/animate.min.css">

    <!-- owl.carousel CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/owl.carousel.css">

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/owl.theme.css">

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/owl.transitions.css">

    <!-- animate CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/animate.css">

 <!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.min.css"/>

    <!-- normalize CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/normalize.css">

    <!-- meanmenu icon CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/meanmenu.min.css">

    <!-- main CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/main.css">

    <!-- educate icon CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/educate-custon-icon.css">

    <!-- morrisjs CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/morrisjs/morris.css">

    <!-- mCustomScrollbar CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/scrollbar/jquery.mCustomScrollbar.min.css">

    <!-- metisMenu CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/metisMenu/metisMenu.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/metisMenu/metisMenu-vertical.css">

    <!-- calendar CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/calendar/fullcalendar.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/calendar/fullcalendar.print.min.css">

    <!-- style CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/style.css">

    <!-- custom csss  ============== -->

        <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/custom.css?ver=<?php echo time();?>">

        <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/video_style.css?ver=<?php echo time();?>"





    <!-- responsive CSS

        ============================================ -->

    <link rel="stylesheet" href="<?php echo base_url();?>asset/user/css/responsive.css">

    <!-- modernizr JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/vendor/modernizr-2.8.3.min.js"></script>

</head>



<body>

<?php



 if(!empty($user_id))

 {

    $user_id=$user_id;

 }



?>

    <div class="left-sidebar-pro">

        <?php

         if($user_type=="organization")

         {



         ?>

        <nav id="sidebar" class="">

            <div class="sidebar-header" style="padding:10px">

             <!--    <img class="main-logo" src="<?php//echo base_url();?>asset/img/logo.png" alt="" /> -->

                <strong><a href="#"><?php echo $user_name;?></strong>

            </div>

            <div class="left-custom-menu-adp-wrap comment-scrollbar">

                <nav class="sidebar-nav left-sidebar-menu-pro">

                    <ul class="metismenu" id="menu1">

                        <li class="active">

                            <a  aria-expanded="false" href="<?php echo base_url('dashboard/'.$user_id);?>">

                                   <span class="educate-icon educate-home icon-wrap"></span>

                                   <span class="mini-click-non">Dashboard</span>

                                </a>

                            

                        </li>

                       

                        <li>

                            <a  href="<?php echo base_url('employee/'.$user_id);?>" ><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Referrals</span></a>

                            

                        </li>

                        

                    <li>

                            <a  href="<?php echo base_url('analytics/'.$user_id);?>" ><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Referrals Analytics</span></a></li>

                    <li>

                    

                    

                   <!--  <li>

                            <a  href="<?php //echo base_url('video_analytics/'.$user_id);?>" ><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Videos Analytics</span></a></li>

                    <li>-->

                            <a  href="<?php echo base_url('chennals/'.$user_id);?>" ><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Training Videos</span></a></li> 



                    <!--  <li >

                          <a class="has-arrow" aria-expanded="false" href="#"> <span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Quiz</span></a>



                            <ul class="submenu-angle" aria-expanded="false">

                                <li> <a  href="<?php //echo base_url('test/'.$user_id);?>" >Quiz Lists</a></li>

                                <li> <a  href="<?php// echo base_url('add_test/'.$user_id);?>" >Add Quiz</a></li>

                            </ul>

                        </li> 

                        -->

                       <!-- <li>

                            <a  href="<?php //echo base_url('result/'.$user_id);?>" ><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Quiz Result</span></a></li> 
                             <li>
                             -->

                            <a  href="<?php echo base_url('leaderboard/'.$user_id);?>" ><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Leader Board</span></a></li> 

                        

                    </ul>

                </nav>

            </div>

    </nav>

    <?php

    }

   ?>

     <nav id="sidebar" class="">

            <div class="sidebar-header" style="padding:10px">

                 <strong><a href="#"><?php echo $user_name;?></strong>

            </div>

            <div class="left-custom-menu-adp-wrap comment-scrollbar">

                <nav class="sidebar-nav left-sidebar-menu-pro">

                    <ul class="metismenu" id="menu1">

                        <li class="active">

                            <a  aria-expanded="false" href="<?php echo base_url('library/');?>">

                                   <span class="educate-icon educate-home icon-wrap"></span>

                                   <span class="mini-click-non">Dashboard</span>

                                </a>                          

                        </li>       
                    <li>

                       <a  href="<?php echo base_url('library-list');?>" >
                       <span class="educate-icon educate-library icon-wrap"></span> 
                       <span class="mini-click-non">Training Videos</span></a>
                    </li> 
                    <li>

                       <a  href="<?php echo base_url('library/quiz_result/'.$user_id);?>" >
                       <span class="educate-icon educate-course icon-wrap"></span> 
                       <span class="mini-click-non">Quiz Result</span></a>
                    </li>        

                    </ul>

                </nav>

            </div>

    </nav>

    <?php

  ?>

</div>

<div class="all-content-wrapper">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="logo-pro">
                         <strong><a href="#"><?php echo $user_name;?></a></strong>

                      <!--   <a href="#"><img class="main-logo" src="<?php //echo base_url();?>asset/img/logo.png" alt=""></a> -->

                    </div>

                </div>

            </div>

        </div>

        <div class="header-advance-area">

            <div class="header-top-area">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="header-top-wraper">

                                <div class="row">

                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">

                                        <div class="menu-switcher-pro">

                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">

                                                    <i class="educate-icon educate-nav"></i>

                                                </button>

                                        </div>

                                    </div>

                               

                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                        <div class="header-right-info">

                                            <ul class="nav navbar-right navbar-nav mai-top-nav header-right-menu">

                                               

                                                

                                            <li class="nav-item ">
                                                    <a href="#" data-toggle="dropdown" role="button" class="nav-link dropdown-toggle">
                                                        
                                                             <span class="admin-name">

                                                                <?php

                                                               



                                                                if(!empty($user_name))

                                                                {

                                                                    echo $user_name;

                                                                }



                                                                ?>

                                                            </span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                          <li><a href="<?php echo base_url('logout');?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                          </li>

                                                    </ul>
                                                </li>

                                             



                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php

             if($user_type=="organization")

         {

            ?>

            <!-- Mobile Menu start -->

            <div class="mobile-menu-area">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="mobile-menu">

                               

                                <nav id="dropdown" style="display: block;">

                                    <ul class="mobile-menu-nav">

                                 <?php

         if($user_type=="organization")

         {



         ?>


                                  

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('dashboard/').$user_id;?>">Dashboard <span class="admin-project-icon edu-icon "></span></a>

                                            

                                        </li>

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('employee/').$user_id;?>">Employee <span class="admin-project-icon edu-icon "></span></a>

                                            



                                        </li>

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('analytics/').$user_id;?>">Analytics <span class="admin-project-icon edu-icon "></span></a>

                                            

                                        </li>

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('chennals/').$user_id;?>">Courses <span class="admin-project-icon edu-icon "></span></a>

                                            

                                        </li>
            <?php
        }

         if($user_type=="employee")

         {



         

        ?>
                  <li class="active" data-toggle="collapse" data-target="#demoevent">

                            <a  aria-expanded="false" href="<?php echo base_url('library/');?>">

                                   <span class="educate-icon educate-home icon-wrap"></span>

                                   <span class="mini-click-non">Dashboard</span>

                                </a>                          

                        </li>       
                    <li data-toggle="collapse" data-target="#demoevent">

                       <a  href="<?php echo base_url('library-list');?>" >
                       <span class="educate-icon educate-library icon-wrap"></span> 
                       <span class="mini-click-non">Training Videos</span></a>
                    </li> 
                    <li data-toggle="collapse" data-target="#demoevent">

                       <a  href="<?php echo base_url('library/quiz_result/'.$user_id);?>" >
                       <span class="educate-icon educate-course icon-wrap"></span> 
                       <span class="mini-click-non">Quiz Result</span></a>
                    </li>     
            
        <?php
    }
    else
    {

    }
    ?>

                        

                                    </ul>

                                </nav>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php

        }

        else

        {

        ?>

                <div class="mobile-menu-area">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="mobile-menu">

                               

                                <nav id="dropdown" style="display: block;">

                                    <ul class="mobile-menu-nav">



                                  
                                 <?php

         if($user_type=="organization")

         {



         ?>


                                  

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('dashboard/').$user_id;?>">Dashboard <span class="admin-project-icon edu-icon "></span></a>

                                            

                                        </li>

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('employee/').$user_id;?>">Employee <span class="admin-project-icon edu-icon "></span></a>

                                            



                                        </li>

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('analytics/').$user_id;?>">Analytics <span class="admin-project-icon edu-icon "></span></a>

                                            

                                        </li>

                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?php echo base_url('chennals/').$user_id;?>">Courses <span class="admin-project-icon edu-icon "></span></a>

                                            

                                        </li>
            <?php
        }

         if($user_type=="employee")

         {



         

        ?>
                  <li class="active" data-toggle="collapse" data-target="#demoevent">

                            <a  aria-expanded="false" href="<?php echo base_url('library/');?>">

                                   <span class="educate-icon educate-home icon-wrap"></span>

                                   <span class="mini-click-non">Dashboard</span>

                                </a>                          

                        </li>       
                    <li data-toggle="collapse" data-target="#demoevent">

                       <a  href="<?php echo base_url('library-list');?>" >
                       <span class="educate-icon educate-library icon-wrap"></span> 
                       <span class="mini-click-non">Training Videos</span></a>
                    </li> 
                    <li data-toggle="collapse" data-target="#demoevent">

                       <a  href="<?php echo base_url('library/quiz_result/'.$user_id);?>" >
                       <span class="educate-icon educate-course icon-wrap"></span> 
                       <span class="mini-click-non">Quiz Result</span></a>
                    </li>     
            
        <?php
    }
    else
    {

    }
    ?>

                              

                        

                                    </ul>

                                </nav>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        <?php

    }

    ?>



            <!-- Mobile Menu end -->

            <div class="breadcome-area">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="breadcome-list single-page-breadcome">

                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                        <div class="breadcome-heading">

                                         

                                        </div>

                                    </div>

                              

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

      <!-- Main content start -->

      <?php

  

         echo $contents;



      ?>

      <!--main content End-->

        <!-- Basic Form End-->

  <!--       <div class="footer-copyright-area">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="footer-copy-right">

                            <p>Copyright © 2019 <a href="https://colorlib.com/wp/templates/">Simply</a> All rights reserved.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div> -->

    </div>





    <!-- jquery

        ============================================ -->

  <script src="<?php echo base_url();?>asset/js/vendor/jquery-2.2.4.min.js"></script>

    <!-- bootstrap JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <!-- wow JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/wow.min.js"></script>

    <!-- price-slider JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/jquery-price-slider.js"></script>

    <!-- meanmenu JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/jquery.meanmenu.js"></script>

    <!-- owl.carousel JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/owl.carousel.min.js"></script>

    <!-- sticky JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/jquery.sticky.js"></script>

    <!-- scrollUp JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/jquery.scrollUp.min.js"></script>

    <!-- counterup JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/counterup/jquery.counterup.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/counterup/waypoints.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/counterup/counterup-active.js"></script>

    <!-- mCustomScrollbar JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/scrollbar/mCustomScrollbar-active.js"></script>

    <!-- metisMenu JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/metisMenu/metisMenu.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/metisMenu/metisMenu-active.js"></script>



    <!-- Datatable ===========================-->

          <!-- data table JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/data-table/bootstrap-table.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/tableExport.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/data-table-active.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/bootstrap-table-editable.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/bootstrap-editable.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/bootstrap-table-resizable.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/colResizable-1.5.source.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/data-table/bootstrap-table-export.js"></script>



    <!-- morrisjs JS

        ============================================ -->

<!--     <script src="<?php //echo base_url();?>asset/user/js/morrisjs/raphael-min.js"></script>

    <script src="<?php //echo base_url();?>asset/user/js/morrisjs/morris.js"></script>

    <script src="<?php //echo base_url();?>asset/user/js/morrisjs/morris-active.js"></script> -->

    <!-- morrisjs JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/sparkline/jquery.sparkline.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/sparkline/jquery.charts-sparkline.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/sparkline/sparkline-active.js"></script>

    <!-- calendar JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/calendar/moment.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/calendar/fullcalendar.min.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/calendar/fullcalendar-active.js"></script>

    <!-- plugins JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/plugins.js"></script>

    <script type='text/javascript'>

        var baseURL= "<?php echo site_url();?>";

         var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';

        </script>

    <!-- main JS

        ============================================ -->

    <script src="<?php echo base_url();?>asset/user/js/main.js"></script>

    <script src="<?php echo base_url();?>asset/user/js/question.js?ver=<?php echo time();?>" ></script>

   

<!--    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

   <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> -->



 



<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-html5-1.5.6/sl-1.3.0/datatables.js"></script>







    <script src="<?php echo base_url();?>asset/user/js/custom.js?ver=<?php echo time();?>"></script>

    <script src="<?php echo base_url();?>asset/user/js/video_script.js?ver=<?php echo time();?>"></script>

</body>



</html>

