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
  .primary-btn {
    background: #f7631b;
    line-height: 42px;
    padding-left: 30px;
    padding-right: 30px;
    border: none;
    color: #fff;
    display: inline-block;
    font-weight: 500;
    position: relative;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    cursor: pointer;
    position: relative;
}
  .error
  {
    color:#ff3333;
  }
  label{color:#777 ;}
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

                   
              <div class="form-group text-left">
              <label for="sel1">Username</label>
                <input type="text" class="form-control" name="user_name" placeholder="Username" required="" />
              </div>
              <div class="form-group text-left">
              <label for="sel1">Password</label>
                <input type="password" class="form-control" password="password" placeholder="Password" name="password" required="" />
              </div>
              <div class="form-group text-center">
               
                 
                <button type="submit" class="primary-btn text-uppercase" id="login_submit" name="login_submit">Login</button>
               
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
