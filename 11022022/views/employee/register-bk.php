<style>
      .register-box
      {
          background: #ffffff;
          padding: 20px;
          margin-top:50px;
      }

      section.login {
          background: red;
          background-color: #eee;
          padding: 30px;
      }
      .error{
        color:#4F8CAE !important;
      }
      
      input {
          margin-top: 10px;
      }
      button#register_submit {
          margin-top: 20px;
      }
      .register-box img {
          width: 200px;
      }
</style>
      <section class="login">

        <div class="container">
                    
          <div class="row justify-content-between align-items-center full_form">
          

          <div class="col-md-8 mx-auto">
            <div class="register-box">
              <div id="logo" class="text-center mt-5 mb-5">
						    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>asset/img/logo.png" alt="" title="" /></a> 
                </div>
                <h3 class="text-center text-white">Register</h3>
                    <div  id="msform" class="register-msg">

               </div>
                <div id="msform">    
               
                <?php 
                  
                  if($invite_status==1)
                  {
                   echo "<h4 class='text-light error'>Already verfiy Your email or invalid code";
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
              

                     <div class="row">
                <div class="col-sm-6 col-md-6">
                  <input type="text" name="first_name" class="form-control" id="first_name"   placeholder="First Name *"/>

                </div>
                <div class="col-sm-6 col-md-6">
                <input type="text" name="last_name" class="form-control" id="last_name"   placeholder="Last Name *"/>
                </div>
                </div>
                <?php
               }
              ?>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <input type="text" name="first_name" class="form-control" id="user_name"   placeholder="User Name *"/>

                </div>
                <div class="col-sm-6 col-md-6">
                   <input type="email" <?php $check; ?> name="primary_email" class="form-control" id="primary_email"  placeholder="Primary Email ID *" value="<?php echo $emp_mail;?>">
                </div>
              </div>
              <?php
              if(($invite_type=='invite') || ($invite_type=='website'))
               {
              ?>
                <div class="row">
                <div class="col-sm-6 col-md-6">
                  <input type="text" name="phone_no" class="form-control" id="phone_no"   placeholder="Mobile No"/>

                </div>
                <div class="col-sm-6 col-md-6">
                <input type="text" name="address" class="form-control" id="address"   placeholder="address"/>
                </div>

                    </div>
                    <?php
               }
               ?>
                  <div class="row">
                
                   
                <div class="col-sm-6">
                <input type="hidden" id="client_id" name="client_id" value="<?php echo $client_id;?>">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password *"/>
                </div>
              
                    
                
                
                <div class="col-sm-6">
                   <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password *"/>
              </div>
               
              </div>
                 
                <button type="submit" class="primary-btn text-uppercase" id="register_submit" name="register_submit">Register</button>
              </form>
                   <div class="mt-20 row">
                <div class="col-sm-12 text-center">
              

              <p>Already  have an account <a href="<?php echo base_url();?>">Login</a></p>
            </div>
            </div>
              <?php
           }
            ?>
         
        </div>
                  </div>
          </div>
      </div>
    </div>
        

<!-- MultiStep Form -->

</section>
