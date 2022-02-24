
<style>
.bg-color{
    
    padding: 30px;
     
    background-clip: padding-box;
}
.custom-col
{
   /* padding: 40px;*/
  
}
 h5,p{
    margin: 20px 0px !important;
 }
 .videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
<?php

    
    echo "<div class='row bg-color'>";
    
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
    ?>
     <div class="back-btn" style="margin-bottom:10px"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
    <?php
   if ($valid ) {
       $img_path='';
       
       $videoId=explode('v=',$course['course_filename']);
           echo "<h5>".$title."</h5>";
           
           
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
     
		
		
	
		
	
		
	   
		echo "<h5>".$course['course_title']."</h5>";
		//echo "<div class='video-wrapper'>				<video  width='600' heigth='400' src='".$video_url."' disablePictureInPicture controlsList='nodownload' poster='".$img_path."'>	</div>";
			echo "<div class='video-wrapper'>	
			    <video  width='800' heigth='400' src='".$video_url."'  controlsList='nodownload' controls>	</div>


				</div>";
		
		echo "</div>
		<div class='row'><div class='col-sm-10 ' style='margin-top:2rem'><input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		echo "<p><b>Description :</b> </p> ";
		echo "<p>".$course['course_description']."</p>";
		
	
   }
   
    }
    echo "</div>";
	 
?>
<div id="take_test_emp" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">Take Quiz
                </h4>
            </div>
            <div class="modal-body modal-body-del">
            	    <div class="row">
            	    	<div class="col-sm-12">
            	    	  <label> Video completed. Are you taken Quiz?</label>
					     
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


<div id="test_coming_soon" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                
                <h4 class="modal-title">Coming soon
                </h4>
            </div>
            <div class="modal-body ">
            	This page is under construction
            </div>
        </div>
    </div>
</div>