  <!-- start banner Area -->
      <section class="banner-area relative about-banner" id="home"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Register       
              </h1> 
              <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Register</a></p>
            </div>  
          </div>
        </div>
      </section>
      <!-- End banner Area -->  

			<!-- Start search-course Area -->
			<section class=" relative">
				
				<div class="container">
					<div class="row justify-content-between align-items-center">

         


						<div class="col-lg-12 col-md-8 search-course-right section-gap " >
								   <div  id="msform" class="register-msg">
             
            </div>
					   <div id="msform">    
              <fieldset id="setup-content">
              <form name="login " id=" login" class="form-wrap" method="post" action="<?php echo base_url().'login_process';?>" >

            <fieldset id="setup-content">
                <h2 class="fs-title">Personal Details</h2>
                
                <input type="text" name="first_name" id="first_name" required="required" placeholder="First Name *"/>
                <input type="text" name="last_name" id="last_name" required="required"  placeholder="Last Name *"/>
                <input type="email" name="primary_email" id="primary_email"  required="required" placeholder="Primary Email ID *">
                <input type="email" name="company_email" id="company_email" required="required" placeholder="Company Email Id *" readonly value="<?php echo $emp_mail;?>">
                <input type="hidden" id="client_id" name="client_id" value="<?php echo $client_id;?>">
                <input type="text" name="phone" id="phone" placeholder="Phone Number"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
                          
                <button type="submit" class="primary-btn text-uppercase" id="register_submit" name="register_submit">Register</button>
              </form>
              <div class="mt-20 row">
                <div class="col-sm-12 text-center">
              

              <p>Already  have an account <a href="<?php echo base_url('login');?>">Login</a></p>
            </div>
            </div>
          </fieldset>
        </div>

						
					</div>
				</div>	
			
<!-- MultiStep Form -->

</section>
