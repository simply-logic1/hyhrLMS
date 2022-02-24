<p>Courses Details list </p>
<?php

	
	echo "<div class='row'>";

	foreach($course_det as $course)
	{
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     
		echo "<div class='col-sm-7'>";

		
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
	    
		
	   
		echo "<h5>".$course['course_title']."</h5>";
		// echo "<div class='video-wrapper'>

		// 		<video  width='600' heigth='400' src='".$video_url."' poster='".$img_path."'>
                  
		// 	</div>";
		echo "<div class='video-wrapper'>	<a href='".base_url('details/video/'.$id)."' target='_blank'><img src='".$img_path."' width='600' heigth='400' /></a>	</div>";
		
		echo "</div><div class='col-sm-5' style='margin-top:2rem'>";
		echo "Description : <br/>";
		echo $course['course_description'];
		
		echo "</div><br/>";

	}
	echo "</div>";
?>