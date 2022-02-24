
<style>
	 .login-box {
     
    padding: 30px !important;
    background-color: #fff;
     
    padding: 30px;
     
}
div#logo img {
    width: 200px;
}
body.login {
    background-color: #eee;
}
	</style>

			<section class="login">



				<div class="container mt-4">

					<div class="row">

						<div class="col-md-6 offset-md-3 login-box p-5">

						  <div id="logo" class="text-center  ">

			          <a href="#"><img src="<?php echo base_url();?>asset/img/logo.png" alt="" title="" /></a> 

			           <!--<h3 class="text-light">Corporate Training</h3>-->

			          </div>

							<div id="msform" class="register-msg">

								 <?php

								 	$login_error= $this->session->flashdata('login_error');

								   if(!empty($login_error))

								   {

								     echo '<div class="alert alert-danger alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
                                 
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



					<div id="msform">



							<form name="login " id="login" class="form-wrap mx-auto text-justify" method="post" action="<?php echo base_url().'login_process';?>" >



								<div class="form-group">

			                  <label for="sel1">Email Id</label>

			                     <input type="email" class="form-control" name="email_id" id="emailid" placeholder="Your Email Address" onfocus="this.placeholder = ''" required onblur="this.placeholder = 'Your Email Address'" >

							</div>



								<div class="form-group">

			                  <label for="sel1">Password</label>

			                    <input type="password" required class="form-control" name="password" id="password" placeholder="Your Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">

			            </div>

			            <div class="form-group text-center">

			            	<button type="submit" class="primary-btn text-uppercase" id="login_submit" name="login_submit">Sign in</button>

			            </div>

                      

			                <div class="form-group ">



			                	<div class="text-center">

			                	<a href="<?php echo base_url('forgot');?>" class=" text-uppercase">Forgot Password</a>

			                </div>



			            </div>

                        

                     



							</form>

                    

				</div>

						</div>

						

				</div>

			</section>



