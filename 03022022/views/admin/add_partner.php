 
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Add Ambassador</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/client');?>"  name="back_btn" id="back_btn"  class="custom-btn-main d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
 
</div>
</div>
<div class=" card-main-div col-lg-12">

                            <div class="card shadow-cs position-relative">
                                 
                                <div class="card-body">
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

<button class="btn btn-primary custom-btn" type="submit">Submit</button>



</div>









</div>

</form>
                                    
                                 
                            </div>

                        </div>

 