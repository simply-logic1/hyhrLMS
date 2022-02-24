<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<title>HYHR - Ambassador</title>

 

    <!-- Custom fonts for this template-->
   
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>asset/admin/css/sb-admin-2.min.css" rel="stylesheet">
<style>
body{
font-family: "Montserrat",Helvetica,Arial,serif;
}
.container {
    padding: 0px !important;
    width: 100%;
    max-width: 100%;
}

.card.o-hidden.border-0.shadow-lg.my-5 {
    margin: 0px !important;
}
.bg-register-image
{
    background: url(<?php echo base_url('asset/img/bg_img.jpg');?>);
	background-size:cover;
	background-position:center;
	
}
form.user .form-control-user {
     
     border-radius: 0px !important;
    
}
.btn:hover {
    background-color: #79C6B7 !important;
}

.btn
{
    text-align: center;
   background-color:  #f7631b;
    border-color:  #f7631b;
    border: 1px solid transparent !important;
    padding: 0.786rem 1.5rem !important;
    border-radius: 0.358rem !important;
	}
	.col-lg-6.form_div {
    padding: 56px;
}
 .form_div {
    padding: 56px;
}
.img-logo
{
    height:100px;
    margin-bottom:20px;
}
.error{
    color:#dc3545;
    font-size:16px;
    margin-bottom:10px;
}
</style>
</head>

<body class=" ">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
				
                <div class="row">
                    <div class="col-lg-7 d-none d-lg-block bg-register-image"></div>
                   <div class="col-lg-5 form_div">
                                <div class="p-5">
                                    <div class="text-left">
									<img src="<?php echo base_url('asset/img/logo.png');?>" alt="logo" class="img-logo">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to HYHR!</h1>
										<p>Please sign-in to your account and start the adventure</p>
                                    </div>
									<div id="msform" class="register-msg">

<?php

	$login_error= $this->session->flashdata('login_error');

  if(!empty($login_error))

  {

	echo '<div class="alert error alert-danger alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button>';

	echo $login_error;

   echo '</div>';

 }
 $msg1=$this->session->flashdata('email_status');
if(!empty($msg1))
{ 

echo '<div id="myModal" class="modal fade " role="dialog">
<div class="modal-dialog">';

echo $msg1;

echo '</div></div>';

}

 ?>

</div>

                                    <form action="<?php echo base_url().'login_process';?>" method="post">           

                                        <div class="form-group">
										<label for="username">Email</label>
                                            <input type="email" required class="form-control form-control-user" name="email_id" id="emailid"  aria-describedby="emailHelp" placeholder="Username">
                                        </div>
                                        <div class="form-group">
										<label for="password">Password</label>
                                            <input type="password" required class="form-control form-control-user" id="exampleInputPassword" name="password" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox"  class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button    type="submit" id="login_submit" name="login_submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        
                                         
                                    </form>
                                     
                                    <!--
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    -->
                                     
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    

</body>

</html>