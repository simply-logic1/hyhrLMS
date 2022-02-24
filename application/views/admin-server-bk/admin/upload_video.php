<div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

               <div class="page-title">
               <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">

                <h3>Add Videos</h3>

              </div>

         



           

            </div>





             <!-- form start -->

               <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="">

                   

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                   <?php 

       

         ?>

       



    



<!-- Content Panel -->



<ul class="nav nav-tabs">

  <li class="active"><a data-toggle="tab" href="#file">Upload Video</a></li>

  <li><a data-toggle="tab" href="#yt_link">Youtube Link</a></li>

 

</ul>



<div class="tab-content">

  <div id="file" class="tab-pane fade in active">

    <form class="form-horizontal" name="add_course" id="add_course" enctype="multipart/form-data" action="<?php echo base_url('add_course');?>" method="post">

                        <div class=" row">

          

          <div class="col-md-8">

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



          

        

         <div class="col-md-4">





            <div class="form-group row">



              <label for="upload_img">Thumbnail Image</label>

      

         

            <input id="thumb_img" type="file" name="thumb_img"  >

         

          </div>

          <div class="form-group row">

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
   <input id="category_name" name="category_name" placholder="Category Name">
    <input type="button" class="add_category" id="add_category" value="Add New Category">


</div>

</div>

            <div class="form-group row">

               <label for="upload_video">Upload Video</label>

      

         

          <input id="cvideo"  class="form-control" type="file" name="course_video" multiple="">

         

          </div>

          </div>

        </div>

        

          

           

         <div class="row">

          <div class="form-actions">

            <button class="btn btn-primary" type="submit">Save Video</button>

           

          </div>

        </div>



        </form>

  </div>

  <div id="yt_link" class="tab-pane fade">

  <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('add_course_link');?>" method="post">

     

          <div class="row">

            <div class="col-sm-12 form-group row">

          



       

          

            <input id="cvideo" name="course_video"  required class="linktype form-control" placeholder="Youtube Link" >

            <div class="form-group row">

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
   <input id="category_name" name="category_name" placholder="Category Name">
    <input type="button" class="add_category" id="add_category" value="Add New Category">


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

            <button class="btn btn-primary" type="submit">Save Video</button>

           

          </div>

        </div>



        </form>

    

  </div>

  

</div>







  

      </div>

                    

                 



          </div>

        </div>

     