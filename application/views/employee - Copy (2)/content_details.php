<?php

	$this->load->helper('secure');
     $msg=$this->session->flashdata('msg');
      

     $vid=encrypt_url($course_det[0]['id']);
     
  ?>

<div class="main-panel">
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Ambassador Education </h3>
  
    <div class="back-btn" style="margin-bottom:10px"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a>
    
    <a class="btn btn-primary" href="<?php echo base_url().'/library/take_test/'.$vid;?>">&lt; Take Test</a>
    
    </div>
  </div>
  <div class="row">
  <?php
  
  
 if(isset($msg))
 {
echo "<div class='row'><div class='alert alert-success'>Quiz completed</div></div>";
}

?>
</div>
  <div class="row">
   
        <?php
       
        if(empty($course_det))
 {
   echo "<div class='col-sm-12 col-md-12 text-center'>No videos</div>";
 }
  
   foreach($course_det as $course)
	{
        $id=encrypt_url($course['id']);
           echo ' <input type="hidden" id="vid" name="vid" value="'.$id.'" >';
          
       $baseurl=base_url('asset/course_content');
     	$video_url=$baseurl."/".$course['course_filename'];
              
    echo "<div class='col-sm-12 custom-col'>";
    echo '<div class="card">
    <div class="card-body">
      <h4 class="card-title">'.$course['course_title'].'</h4>';
      echo "<div class='publish_date'>";

      echo "Published on ". $course['created_on'];
   
      echo "</div>";
      echo "<div class='category '>";
        $cat_array=explode(',',$course['category']);
       
        echo "Categories : "; 
        $this->load->helper('secure');
     
      
      foreach($category as $cat)
      {
         foreach($cat_array as $arr)
         {

           if($arr==$cat['id'])
           {
             $sid=encrypt_url($cat['id']);
             echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("admin/category/".$sid).'"class="view_category is_btn_link">'.$cat['category_name']."</a></button>,";
           }
            
         }

      }
      echo '</div>';
      
      if(($course['thumbnail_image']=='none')||($course['thumbnail_image']==''))
      {
       $img_path= base_url('asset/img/logo.png');
      }
  
    else
    {
            $img_path=$baseurl."/".$course['thumbnail_image'];
    }
                 
    echo '<img src="'.$img_path.'" alt="">';
     
	 echo '<input type="hidden" name="video_type" id="video_type" value="video" >';

			$id=$course_id;
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		//$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
		 
        
		echo " 
		 <input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		echo "<p><b>Description :</b> </p> ";
		echo "<p>".$course['course_description']."</p>";
		
	
   
   echo "</div></div>";
    }
    echo "</div>";
	 
?>
 
 <?php
 ?>
 </div>
      </div>
    </div>
    
    
 
     
     
  </div>
</div>
<!-- content-wrapper ends -->

</div>