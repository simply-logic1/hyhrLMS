<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Learning Management | Admin
 </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>asset/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>asset/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>asset/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>asset/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>asset/admin/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>asset/admin/css/custom.css?ver=<?php echo time();?>" rel="stylesheet">
  <style>
  .error
  {
    color:#ff3333;
  }
  </style>
  </head>

  <body class="login">
  <section class="pt-5 mt-5">
    <div class="container pt-5">
     <div class="row">
     <div class="col-md-12">
       <div class="mt-5"></div>
     </div>
     </div>
      <div class="row">
      <div class="col-md-offset-4 col-md-4">
        <div class="animate form login_form">
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

          <div class="login_content">
            <img src="<?php echo base_url();?>asset/img/logo.png">
             
             <div class="error">
              <?php
              $msg=$this->session->flashdata('login_error');
                if(!empty($msg))
                {
                  echo $msg;
                }
              ?>
             </div>
              </div>
              <div class="login_content">
            <form action="<?php echo base_url('check_user');?>" method="post">           


              <div class="form-group">
                <input type="text" class="form-control" name="user_name" placeholder="Username" required="" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" password="password" placeholder="Password" name="password" required="" />
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Login">
               
              </div>

              <div class="clearfix"></div>

            </form>
              </div>
        </div>
      </div>
   
      </div>
    </div>
  </section>
  </body>
</html>
