<div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

               <div class="page-title">
               <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">

                <h3>Add User</h3>

              </div>

         



           

            </div>





             <!-- form start -->

               <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

               

                  <div class="x_content">

                    <br />

                   <?php 

       

         ?>

         <form class="form-horizontal" id="add_user" name="add_user" enctype="multipart/form-data" action="<?php echo base_url('admin/add_user_data');?>" method="post">

                       



                       <div class="">

                       <div class="form-group row">

                       

           <label class="col-md-3 col-form-label" for="hf-title">Name</label>

          <div class="col-md-9">

          <input class="form-control" id="name" type="text" required  name="name" placeholder="Enter Name" >

         

          </div>

          </div>

          <div class="form-group row">

          <label class="col-md-3 col-form-label" for="description">Email</label>

          <div class="col-md-9">

             

          <input class="form-control" id="email" required  type="email" name="email" placeholder="Email" >

         

        

          </div>

		  </div>

            <div class="form-group row">

          <label class="col-md-3 col-form-label" for="description">Mobile</label>

          <div class="col-md-9">

             

          <input class="form-control" id="mobile" required  type="number" name="mobile" placeholder="Mobile" >

         

        

          </div>

    	  </div>



            <div class="form-group row">

          <label class="col-md-3 col-form-label" required for="description">Role</label>

          <div class="col-md-9">

   

          

         



          <select name="user_type" id="user_type" required class="form-control">

                <option value="">Select User Type</option>

                <option value="All Access">All Access</option>

                <option value="Retail">Referrals Access</option>

                <option value="Video">Video Access</option>

                  <option value="Quiz">Quiz Access</option>



                          



          </select>

              

       

         

          </div>

          </div>

               <div class="form-group row">

          <label class="col-md-3 col-form-label" for="password">Password</label>

          <div class="col-md-9">

             

          <input class="form-control" id="password" required  type="text" name="password" placeholder="Password" >

         

        

          </div>

        </div>



          

            

     

         

      

          <div class="form-actions">

            <button class="btn btn-primary" type="submit">Submit</button>

            

          </div>

        

                    

                 



          </div>

        </form>

        </div>

      </div>

    </div>

  </div>

</div>

</div>





    

