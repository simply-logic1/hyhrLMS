

p>welcome chennal list process</p>
<?php

	$this->load->helper('secure');
	echo "<div class='row'>";

	foreach($courses as $course)
	{
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     	$id=encrypt_url($course['id']);
		echo "<div class='col-sm-4'>";

		
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
	    echo "<a href='".base_url('details/'.$id)."' >";
		echo "<img src='".$img_path."' alt='img' width='350' height='250'>";
	   
		echo "<h5>".$course['course_title']."</h5>";
		echo "<p>Details</p></a>";

		
		echo "</div><br/>";

	}
	echo "</div>";
?>