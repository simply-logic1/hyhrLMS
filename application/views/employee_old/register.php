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
									 
                                    </div>
									<div id="msform" class="register-msg">
 

</div>
<div  id="msform" class="register-msg">

               </div>
                <div id="msform">    
               
                <?php 
                  
                  if($invite_status==1)
                  {
                   echo "<h4 class='error'>Already verfiy Your email or invalid code</h4>";
                  }
                  else 
                  {
                  ?>

<form name="emp_register " id="emp_register" class="form-wrap" method="post" action="<?php echo base_url().'signup_emp';?>" >         
<input type="hidden" name="invite_type" class="form-control" id="invite_type"    value="<?php echo $invite_type;?>"/>
               <?php
               $check="disabled";
              if(($invite_type=='invite') || ($invite_type=='website'))
               {
                $check=" ";
              ?>

                                        <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="username">Firstname</label>
                    <input type="text" name="first_name" required class="form-control" id="first_name"   placeholder="First Name *"/>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Lastname</label>
                    <input type="text" name="last_name" required class="form-control" id="last_name"   placeholder="Last Name *"/>
                                        </div>
                                        </div>
              <?php

               }
               ?>
                                        <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Username</label>
                    <input type="text" name="user_name" class="form-control" id="user_name"   placeholder="User Name *"/>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Email</label>
                    <input type="email" <?php $check; ?> name="primary_email" class="form-control" id="primary_email"  placeholder="Primary Email ID *" value="<?php echo $emp_mail;?>">
                                        </div>
                                        </div>
                                        <?php
              if(($invite_type=='invite') || ($invite_type=='website'))
               {
              ?>
                                        <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Phone Number</label>
                    <input type="text" name="phone_no" class="form-control" id="phone_no"   placeholder="Mobile No"/>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Address</label>
                    <input type="text" name="address" class="form-control" id="address"   placeholder="Address"/>
                                        </div>
                                        </div>
              <?php

               }
               ?>
                                        <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Passwrod</label>
                    <input type="hidden" id="client_id" name="client_id" value="<?php echo $client_id;?>">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password *"/>
                    

                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
										<label for="password">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password *"/>
                                        </div>
                                        </div>
                                        <button   type="submit" id="register_submit" name="register_submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        
                                         
                                    </form>
                                     
                                  <?php
                  }
                  ?>
                                    <div class="text-center mt-3">
                                   <p> Already  have an account <a class="small" href="<?php echo base_url();?>">Login</a></p>
                                        
                                    </div>
                                     
                                     
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