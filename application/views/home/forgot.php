 		<!-- Start search-course Area -->
		 <style>
		 .login-box {
    background-color: #ffffff;
    margin-top: 30px;
}

body.login {
    background-color: #eee;
}
div#logo img {
    width: 200px;
}
		 </style>
			<section class=" login">
				
				<div class="container">
					<div class="row justify-content-between align-items-center">    

						<div class="col-md-6 offset-md-3 login-box p-5 ">		

					  <div id="logo" class="text-center mt-5 mb-5">
						<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>asset/img/logo.png" alt="" title="" /></a> 
           	</div>
		
					<div id="msform" class="register-msg">		
								<?php
								 	$forgot_msg= $this->session->flashdata('forgot_msg');
								   if(!empty($forgot_msg))
								   {
								     echo '<div class="alert alert-danger alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button>';
								     echo $forgot_msg;
								    echo '</div>';
								  }
								  ?> 
								<span id="forgot_msg"></span>
							<form name="forgot " id="forgot" class="form-wrap  mx-auto text-justify"  >

								<div class="form-group">
			              <label for="sel1" class="col-form-label">Email Id</label>

			              <input type="email" class="form-control" name="email_id" id="emailid" placeholder="Your Email Address" onfocus="this.placeholder = ''" required="required" onblur="this.placeholder = 'Your Email Address'" >
			              <p> <span id="forgot_error" class="error"></span></p>


							</div>
							<div class="row">							
							<div class="form-group text-center col-md-6">													
								<button type="button" class="primary-btn text-uppercase" id="forgot_submit" name="forgot_submit">Submit</button>
								</div>
								<div class="form-group col-md-6 text-center">
								<a href="<?php echo base_url();?>" class="primary-btn text-uppercase">Login</a>
								</div>
								</div>
							</form>

				</div>
						</div>
	
						
					</div>
				</div>	
			</section>

		