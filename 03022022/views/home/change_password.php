
			<style>
.login {
    background: #ffffff;
    padding: 20px;
}
.login-box img{
	width:200px;
}

section.login {
    background: red;
    background-color: #eee;
    padding: 30px;
}

.register-box img {
    width: 200px;
}

.login-box {
    background: #ffffff;
}
</style>
			<section class="login">



				<div class="container">

					<div class="row">

						<div class="col-md-6 offset-md-3 login-box p-5">

						  <div id="logo" class="text-center mt-5 mb-5">

			          <a href="#"><img src="<?php echo base_url();?>asset/img/logo.png" alt="" title="" /></a> 

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
								  ?>
                     </div>


					<div id="msform">

<?php 
						
						 if($result['status']=='0')
						 {
						 	?>

							<form name="change_password " id="change_password" class="form-wrap mx-auto text-justify" method="post" action="<?php echo base_url().'change_data';?>" >



								<div class="form-group">

			                  <label for="sel1">New Password</label>

			                      <input type="password" class="form-control" name="password" id="password" placeholder="Your password" onfocus="this.placeholder = ''" required onblur="this.placeholder = 'Your Email Address'" >

							</div>



								<div class="form-group">

			                  <label for="sel1">Confirm Password</label>

			                   <input type="hidden" id="sid"  name="sid" value="<?php echo $userid;?>">
			                  <input type="hidden" id="fid"  name="fid" value="<?php echo $fid;?>">
			                    <input type="password" required class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">

			            </div>

			            <div class="form-group">

			            	<button type="submit" class="primary-btn text-uppercase" id="login_submit" name="login_submit">Submit</button>

			            </div>

                      


							</form>

						<?php
						 }
						 else
						 {
						 	
						 	 echo '<div class="alert alert-danger alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
								     echo "Already changed or Invalid id";
								    echo '</div>';
			

						 }
						 ?>

                    

				</div>

						</div>

						

				</div>

			</section>



