<?php

	$this->load->helper('secure');
     $msg=$this->session->flashdata('msg');
      


  ?>

<div class="main-panel">
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Videos </h3>
    <div class="breadcrumb-wrapper vs-breadcrumbs d-sm-block d-none col-12"><nav class="" aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="  <?php echo base_url('library/'.$user_id);?>">Home</a></li><li class="active breadcrumb-item" aria-current="page"><a href="  <?php echo base_url('library-list/');?>">Videos</li></ol></nav></div>
  
    <div class="back-btn" style="margin-bottom:10px"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
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
    
 $this->load->helper('secure');
 $status= $video_status['status'];
$video_sec= strtotime($view_video_length) - strtotime('today'); //125
echo "<input type='hidden' id='video_ratio' name='video_ration' value='".$video_sec."'>	";
   foreach($course_det as $course)
	{
        $id=encrypt_url($course['id']);
           echo ' <input type="hidden" id="vid" name="vid" value="'.$id.'" >';
          
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
               $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $course['course_filename']);
    echo "<div class='col-sm-12 custom-col'>";
    echo '<div class="card">
    <div class="card-body">';
   echo '<div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0"><div><div class="logo-wrapper text-primary"><h3 class="text-primary invoice-logo">'.$course['course_title'].'</h3></div></div><div class="mt-md-0 mt-2"><button type="button" class="btn btn-primary waves-effect mb-25 btn btn-outline-danger btn-block"> Cancel</button></div></div>';
      
    ?>
  
    <?php
   if ($valid ) {
       $img_path='';
       
       $videoId=explode('v=',$course['course_filename']);
           
           
           
       ?>
       <div class='videoWrapper'>
       <div id="player"></div>
       </div>
       <input type="hidden" name="yt_id" id="yt_id" value="<?php echo $videoId[1];?>" >
       <input type="hidden" name="video_type" id="video_type" value="yt" >
       
       
            
            
       <?php
          echo "<input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		echo "<p><b>Description :</b> </p> <br/>";
		echo "<p>".$description."</p>";
       
   } else {
            $img_path=$baseurl."/".$course['thumbnail_image'];
                
     
	 echo '<input type="hidden" name="video_type" id="video_type" value="video" >';

			$id=$course_id;
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		//$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
			$img_path=base_url('asset/img/p1.jpg');

	     $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     
		
		
	
		
	
		
	   
	 
		//echo "<div class='video-wrapper'>				<video  width='600' heigth='400' src='".$video_url."' disablePictureInPicture controlsList='nodownload' poster='".$img_path."'>	</div>";
			echo "<div class='video-wrapper'>	
			    <video  width='800' heigth='400' src='".$video_url."'  controlsList='nodownload' controls>	</div>


				";
		
		echo " 
		 <input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		echo "<p><b>Description :</b> </p> ";
		echo "<p>".$course['course_description']."</p>";
		
	
   }
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
<div id="take_test_emp" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Take Quiz
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
            </div>
            <div class="modal-body modal-body-del">
            	    <div class="row">
            	    	<div class="col-sm-12">
            	    	  <label>Thanks for watching the video.  Would you like to take the quiz now?</label>
					     
					</div>
            	    </div>
                
                	
				            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="test-cancel-btn" data-dismiss="modal">
                    Later</button>
                         <button type="button" class="btn btn-primary" id="test-confirm-button" data-dismiss="modal">
                    Confirm</button>
            </div>
        </div>
    </div>
</div>