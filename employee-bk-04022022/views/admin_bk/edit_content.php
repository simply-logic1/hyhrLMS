<div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

               <div class="page-title">
               <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">

                <h3> Ambassador Education</h3>

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


 



 

    <form class="form-horizontal" name="update_content" id="update_content" enctype="multipart/form-data" action="<?php echo base_url('update_content');?>" method="post">

                        <div class=" row">

                        <?php 
                        
                         
                        echo "<input type='hidden' name='content_id' id='content_id' value='".$content_id."'>";
                        
                         
                        $baseurl=base_url('asset/course_content');
                        $img_path=$baseurl."/".$content['thumbnail_image'];
                        $video_path=$baseurl."/".$content['course_filename'];
                        $doc_name=$baseurl."/".$content['course_docname'];
                        ?>

          <div class="col-md-8">

             <div class="form-group row">

          <input class="form-control" id="video_title" type="text" name="course_title" value="<?php echo $content['course_title'];?>" placeholder="Title" >

        </div>

         

          

            <input type="hidden" name="duration" id="duration" >
            
<div class="">

<div id="file" class="tab-pane fade active in">


           <div class="form-group row">

       

           <textarea id="open-source-plugins" id="course_description" name="course_description"><?php echo $content['course_description'];?></textarea>

      </div>

</div>
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


         <?php 
         $active_class="active";
if($content['thumbnail_image']!='')
{
  $active_class="";
?>
         <div class="form-group row img_view">

        <div class="featured_img_title">
         <label for="upload_img">Featured Image</label>
</div>  
<input type="hidden" class="featured_img" name="featured_img" value="<?php echo $content['thumbnail_image'];?>" >

         <div class="featured_img" data-val="<?php echo $content['thumbnail_image'];?>" >
<img src="<?php echo $img_path;?>" class="content_img" id="content_img " alt="Image">
</div>
    </div>
    <?php

}
?>


            <div class="form-group row upload_img <?php echo $active_class;?>">



              <label for="upload_img">Featured Image</label>

      

         

            <input id="thumb_img" type="file" name="thumb_img"  >

         

          </div>

     
          <div class="form-group row">

<label for="category">   Categories</label>
<div class="category_list">
<div class="category_new">
  </div>
<?php 
 

$combined = array();
$cat_array=explode(',',$content['category']);
foreach ($category as $arr) {
  $comb = array('id' => $arr['id'], 'name' => $arr['category_name'], 'checked' => '');
  foreach ($cat_array as $arr2) {
   
      if ($arr2 == $arr['id']) {
          $comb['checked'] =  'true';
          break;
      }
  }
$combined[] = $comb;
}
 

foreach($combined as $cat)
{ 
   $class="";

   if($cat['checked']=='true')
   {
     $class="checked";

   }
  echo "<div class='category_block'><input type='checkbox' $class value='".$cat['id']."' name='cat_id[]' id='cat_id' >".$cat['name']."</div>";
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
<!--

            <div class="form-group row upload_view">

               <label for="upload_video">   Video</label>

      

        

          <input id="cvideo"  class="form-control" type="file" name="course_video" multiple="">

         

          </div>-->
          <?php 
         $active_doc="active";
if($content['course_docname']!='')
{
  $active_doc="";
?>
          <div class="form-group row file_view">
          <label for="upload_video">   File</label>
          <input type="hidden" id="doc_name" name="doc_name" value="<?php echo $content['course_docname'];?>">
          <?php echo "<p>".$content['course_docname']."</p>"?><button type="button" id="remove_file" class="remove_file" >Remove</button>
</div>
      <?php

}
?>
          <div class="form-group row file_upload <?php echo $active_doc;?>">

<label for="upload_video">   File</label>





<input id="content_file"  class="form-control" type="file" name="content_file" multiple="">



</div>

          </div>

        </div>

        

          

           

         <div class="row">

          <div class="form-actions">

            <button class="btn btn-primary" type="submit">Update Content</button>

           

          </div>

        </div>



        </form>







  

      </div>

                    

                 



          </div>

        </div>

     