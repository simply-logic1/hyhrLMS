<div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

               <div class="page-title">

              <div class="title_left">

                <h3>Add Ambassador</h3>

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

         <form class="form-horizontal" id="add_partner" name="add_partner" enctype="multipart/form-data" action="<?php echo base_url('admin/add_partner_data');?>" method="post">

                       



                       <div class="">

                       <div class="form-group row">

                         <input type="hidden" name="duration" id="duration" >

           <label class="col-md-3 col-form-label" for="hf-title">Ambassador Name</label>

          <div class="col-md-9">

          <input class="form-control" id="name" type="text" required  name="name" placeholder="Ambassador Name" >

         

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

          <label class="col-md-3 col-form-label" required for="description">Address</label>

          <div class="col-md-9">

   

          

          <textarea id="address" type="text" name="address"  class="form-control" rows="3" placeholder="Address"></textarea>

              

       

         

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





    

