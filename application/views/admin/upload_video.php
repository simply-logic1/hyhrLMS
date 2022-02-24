 

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
       
 

<!-- Page Heading -->
<div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Add Video</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/videos');?>"  name="back_btn" id="back_btn"  class="custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
 
</div>
</div>
        <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">
            <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
      aria-selected="true">Upload Video</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
      aria-selected="false">Youtube Link</a>
  </li>
   
</ul>
<div class="tab-content card pt-5" id="myTabContentMD">
  <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
  <form class="form-horizontal" name="add_course" id="add_course" enctype="multipart/form-data" action="<?php echo base_url('add_course');?>" method="post">

<div class=" row">



<div class="col-md-7 first-col">

<div class="form-group row">

<input class="form-control" id="video_title" type="text" name="course_title" placeholder=" Video Title" >

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





<input id="thumb_img" type="file" name="thumb_img"  >



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

<label for="upload_video">Upload Video</label>





<input id="cvideo"  required class="form-control" type="file" name="course_video" multiple="">



</div>

</div>

</div>







<div class="row">

<div class="form-actions">

<button class="custom-btn-form d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit">Save Video</button>



</div>

</div>



</form>

     
  </div>
  <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
  <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('add_course_link');?>" method="post">

     

<div class="row">

  <div class="col-sm-12 form-group row">









  <input id="cvideo" name="course_video"  required class="linktype form-control" placeholder="Youtube Link" >

  <div class="form-group row row-flex-yt">

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
<input id="category_name" class="form-control" name="category_name" placholder="Category Name">
<input type="button" class="custom-btn-inline d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm add_category" id="add_category" value="Add New Category">


</div>

</div>

</div>

  </div>

  <!--

<div class=" row">

  

<div class="col-sm-12 form-group row">



 <select class="form-control" required id="course_type" name="course_type">

  <option value="0">Select Video Type</option>

  <option value="free_video">Free Course</option>

  <option value="paid_video">Paid Course</option>



 

</select>

</div>

</div>

-->



 

<div class="row">

<div class="form-actions">

  <button class="custom-btn-form d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit">Save Video</button>

 

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
