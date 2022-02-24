  <!-- start banner Area -->
      <!--<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content-log col-lg-12">
              <h1 class="text-white">
                Register
              </h1>
              <p class="text-white link-nav"><a href="<?php echo base_url('home');?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Register</a></p>
            </div>
          </div>
        </div>
      </section>-->
      <!-- End banner Area -->

			<!-- Start search-course Area -->
			<section class="login pb-5">

				<div class="container">
          <div class="row justify-content-between align-items-center ">

           <div class="col-lg-12 col-md-8 text-center" >
           
           <img src="<?php echo base_url('asset/img/Asset-2.png');?>">
                    

               </div>
             </div>
                 <div class="row justify-content-between align-items-center ">

					<div class="col-lg-12 col-md-10">
                    <fieldset>
             <div  id="msform" class="register-msg">
                    
                    

               </div>
               </fieldset>
               </div>
               </div>
					<div class="row justify-content-between align-items-center full_form">

					<div class="col-lg-12 col-md-10">

						<form id="msform" class="register_form" method="post" >
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Account Details</li>

                 <li>Confirm</li>



            </ul>
            <!-- fieldsets -->

            <fieldset id="setup-content">
                <h2 class="fs-title">Account Details</h2>
                <div class="row">
                   <div class="col-sm-6 col-md-6">
                     <input type="text" name="first_name" class="form-control" id="first_name" required="required" placeholder="First Name *"/>
                   </div>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" name="last_name" class="form-control" id="last_name" required="required"  placeholder="Last Name *"/>
                   </div>
                </div>
                 <div class="row">
                   <div class="col-sm-6 col-md-6">
                     <input type="email" name="primary_email" class="form-control" id="primary_email"  required="required" placeholder="Primary Email ID *">
                   </div>
                    <div class="col-sm-6 col-md-6">
                       <input type="email" name="confirm_email" class="form-control" id="confirm_email" required="required" placeholder="Confirm Email Id *">
                   </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number"/>
                  </div>
                     <div class="col-sm-6 col-md-6">
                       <input type="text"  name="company_name" class="form-control"  id="company_name" required="required" placeholder=" Company Name *" >
                  </div>
                </div>
                  <div class="row">
                  <div class="col-sm-6 col-md-6">
                     <input type="text"  name="comp_address" class="form-control" id="comp_address" placeholder="Company Address" >
                  </div>

                   <div class="col-sm-6 col-md-6">
                  <input type="text" name="no_of_emp" id="no_of_emp" class="form-control" required="required" placeholder="Company Size *">
                </div>
                </div>


                <input type="button" name="next" class="next action-button" value="Next"/>

            </fieldset>

            <fieldset id="setup-content">
                <h2 class="fs-title">Confirm</h2>
                <br/>
                
                <div class="row"> 
                <div class="col-sm-6 col-md-6 text-right">
                  Name
                </div>
          
                <div class="col-sm-6 col-md-6 text-left" >
                <p id="name"></p>
                  
                 
                </div>
                </div>
                
                 <div class="row"> 
                <div class="col-sm-6 col-md-6 text-right">
                  Company Name
                </div>
                <div class="col-sm-6 col-md-6 text-left" >
                <p id="cname"></p>
                  
                 
               
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6 col-md-6 text-right" >
                Email
                </div>
                
                  <div class="col-sm-6 col-md-6 text-left" >
                <p id="email"></p>
                  
                 
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6 col-md-6 text-right" >
                Mobile
                </div>
               
                  <div class="col-sm-6 col-md-6 text-left" >
                <p id="mobile"></p>
                  
                 
               
                </div>
                </div>
                


                <input type="button" name="previous" class="text-center previous action-button-previous" value="Previous"/>
                <input ttype="button" name="next" class="next text-center  action-button submit" value="Submit"/>


            </fieldset>



    </form>


					</div>
     
         
				</div>

<!-- MultiStep Form -->

</section>
