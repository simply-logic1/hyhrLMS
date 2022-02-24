 
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Add Document</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/document');?>"  name="back_btn" id="back_btn"  class="custom-btn-main d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
 
</div>
</div>
<div class=" card-main-div col-lg-12">

                            <div class="card shadow-cs position-relative">
                                 
                                <div class="card-body">
                                <form class="form-horizontal" id="add_doc" name="add_doc" enctype="multipart/form-data" action="<?php echo base_url('admin/add_doc_data');?>" method="post">

                       



<div class="">

<div class="form-group row">

  <input type="hidden" name="duration" id="duration" >

<label class="col-md-3 col-form-label" for="hf-title">Title</label>

<div class="col-md-9">

<input class="form-control" id="name" type="text" required  name="name" placeholder="Document Title" >



</div>

</div>

<div class="form-group row">

<label class="col-md-3 col-form-label" for="description">File</label>

<div class="col-md-9">



<input class="form-control" id="uploadfile" required  type="file" name="uploadfile" placeholder="File" >





</div>

</div>

<div class="form-group row  ">

<label class="col-md-3 col-form-label" for="description" >  Categories</label>
<div class="col-md-9">
<div class="category_list ">
<div class="category_new">
</div>
<?php 

foreach($category as $cat)
{

echo "<div class='category_block'><input type='checkbox' value='".$cat['id']."' name='cat_id[]' id='cat_id' >".$cat['category_name']."</div>";
}

?>


</div>

<button id="new_category" type="button" class="new_category is_btn_link">Add New Category</button>

<div class="cat_view">
<p>New Category Name</p>
<input id="category_name" class="form-control" name="category_name" placeholder="Category Name">
<input type="button" class="custom-btn-inline d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm add_category" id="add_category" value="Add New Category">

</div>
</div>

</div>



 











<div class="form-actions">

<button class="btn btn-primary custom-btn" type="submit">Submit</button>



</div>









</div>

</form>
                                    
                                 
                            </div>

                        </div>

 