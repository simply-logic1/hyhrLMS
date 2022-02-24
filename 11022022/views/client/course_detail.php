
<?php

	
	echo "<div class='row'>";
    ?>
	 
	<?php
	foreach($course_det as $course)
	{
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
               $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $course['course_filename']);
	echo "<div class='col-sm-10'>";
	?>
	<div class="back-btn" style="margin-bottom:10px"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>

	<?php
   if ($valid ) {
       $img_path='';
       
       $videoId=explode('v=',$course['course_filename']);
           echo "<h5>".$title."</h5>";
       ?>
       
       
          <iframe id="iframe" style="width: 100%; height: 100%"
            src="//www.youtube.com/embed/<?php echo $videoId[1]; ?>"
            data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId[1]; ?>?autoplay=1"></iframe>
            
            
       <?php
           echo "</div>
		<div class='row'><div class='col-sm-10 ' style='margin-top:2rem;margin-left:1rem'><input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		echo "<p><b>Description :</b> </p> <br/>";
		echo "<p>".$description."</p>";
       
   } else {
            $img_path=$baseurl."/".$course['thumbnail_image'];
                
     
	

			$id=$course_id;
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		//$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
			$img_path=base_url('asset/img/p1.jpg');

	     $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     
		
		
		//$video_sec= strtotime($view_video_length) - strtotime('today'); //125
	
		
	   
		echo "<h5>".$course['course_title']."</h5>";
		//echo "<div class='video-wrapper'>				<video  width='600' heigth='400' src='".$video_url."' disablePictureInPicture controlsList='nodownload' poster='".$img_path."'>	</div>";
			echo "<div class='video-wrapper'>	
			    <video  width='800' heigth='400' src='".$video_url."'  controlsList='nodownload' controls>	</div>


				</div>";
		
		echo "</div>
		<div class='row'><div class='col-sm-10 ' style='margin-top:2rem'><input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		echo "<p><b>Description :</b> </p> <br/>";
		echo "<p>".$course['course_description']."</p>";
		
	
   }
   
	}
	echo "</div>";
?>