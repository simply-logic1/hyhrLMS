 

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
      
        <div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Add Ambassador Education</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/all_content');?>"  name="back_btn" id="back_btn"  class=" custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
 
</div>
</div>
        <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">
            
<div class=" " id="myTabContentMD">
  <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
  <form class="form-horizontal" name="add_content" id="add_content" enctype="multipart/form-data" action="<?php echo base_url('add_content');?>" method="post">

<div class=" row">



<div class="col-md-7 first-col">

<div class="form-group row">

<input class="form-control" id="video_title" type="text" name="course_title" placeholder="Title"  >

</div>





<input type="hidden" name="duration" id="duration" >

<div class="form-group row">




<textarea id="open-source-plugins" id="course_description" name="course_description">

</textarea>

</div>

<!--

<div class="form-group row">



<select class="form-control" id="course_type" name="course_type">

<option value="0">Select Video Type</option>

<option value="free_video">Free Course</option>

<option value="paid_video">Paid Course</option>





</select>

</div>

-->



</div>







<div class="col-md-4 second-col">





<div class="form-group row">



<label for="upload_img">Thumbnail Image</label>
<!--
<button type="button" id="insert_image"  data-toggle="modal" data-target="#imgModal" class="insert_image" >Add Thumbnail Image</button>


-->
<input id="thumb_img" type="file" name="thumb_img" class="form-control"  >




</div>

<div class="form-group row row-flex">

<label for="category">   Categories</label>
<div class="category_list">
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

<div class="form-group row">

<label for="upload_video">Upload Document</label>





<input id="content_file"  class="form-control" type="file" name="content_file" multiple="">



</div>

</div>

</div>







<div class="row">

<div class="form-actions">

<button class="custom-btn-form d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit">Save Content</button>



</div>

</div>



</form>

     
  </div>
   
</div>
</div>
</div>

</div>
    <!-- /.container-fluid -->

 
<!-- End of Main Content -->
 <!-- Modal content-->
<!-- Modal -->
<div id="imgModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      Media
        <button type="button" class="close" data-dismiss="modal">&times;</button>
  
      </div>
      <div class="modal-body">
      <div class="container">
     
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload Image</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Media List</a>
  </li>
  
</ul>
<div class="tab-content mt-3 mb-3" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <input id="thumb_img" type="file" name="thumb_img" class="form-control"  >
   
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
   <?php 
     
    
     $this->load->helper('secure');
 
foreach($media as $client)
{   
  if($client['media_type']=='')
  {

  $this->load->helper('secure');
  $id=encrypt_url($client['id']);
  $baseurl=base_url('asset/course_content');
?>

 

            

 
        <a href="<?php echo $imageURL; ?>" data-fancybox="images" data-caption="<?php echo $client["filename"]; ?>" >
           
            <img src="<?php echo $baseurl."/".$client['filename'];?>"  alt="Video_image" class=" img-fluid img-responsive">
        </a>
       
        
   
 

 
<?php
 



 }
}

?>
  </div>
 
</div>
  
</div>
<!-- /.container -->
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
        <button type="button" class="btn btn-default" >Insert </button>
      </div>
    </div>

  </div>
</div>