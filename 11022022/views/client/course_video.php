<!doctype html>
<html class="no-js" lang="en">
<?php
 $user_id=$this->session->userdata('user_unique_id');
  $user_name=$this->session->userdata('user_name');
  $user_type=$this->session->userdata('user_type');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Traning -<?php echo $user_id;?> </title>
    <meta name="description" content="Corporate Traning">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	 		 <link href="<?php echo base_url();?>asset/css/style.css?ver=<?php echo time();?>" rel="stylesheet">
	 		  		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">		
    <style>
    .main-menu {
    padding-bottom: 20px;
    padding-top: 20px;
}
#header {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    transition: all 0.5s;
    z-index: 997;
    background:black;
    margin-bottom:5rem;
}
body {
    color: #777;
    font-family: "Poppins",sans-serif;
    font-size: 14px;
    font-weight: 300;
    line-height: 1.625em;
    position: relative;
}





</style>
</head>
<body>



	<header id="header">
	  		
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <h3 class="text-light">Corporate Training</h3>
			      </div>
			      <!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		 </header>
  <div class="overlay"></div>

<div class="container">
	<div class="jumbotron jumbotron-fluid">
  <?php


	
	
	 // print "video status";
	 // print"<br/>";
	 // print_r($video_status);
	 $status= $video_status['status'];
	 if($status==='completed')
		{

				echo "<button class='alert alert-primary'>Take Test</button>";
		}

 //print_r($course_det);
	foreach($course_det as $course)
	{
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     
		
		
		$video_sec= strtotime($view_video_length) - strtotime('today'); //125
		echo "<input type='hidden' id='video_ratio' name='video_ration' value='".$video_sec."'>	";
echo "<input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		// 	echo "status".$course['status'];
		// if($course['status']==='completed')
		// {

		// 		echo "<div class='alert alert-primary'>Take Test</div>";
		// }

		
		// $video_sec=time(strtotime($view_video_length));
		
		
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		//$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
	// $img_path=base_url('asset/img/p1.jpg');
		
	   
	// 	echo "<h5>".$course['course_title']."</h5>";
	// 	echo "<div class='video-wrapper'>			<video  width='800' heigth='400' src='".$video_url."'  controlsList='nodownload' controls>	</div>";
	
		
	// 	echo "</div><div class='col-sm-3' style='margin:5rem'>
	// 	
	// 	echo "Content : <br/>";
	// 	echo "1.Basic of OOPs";
		
		
	// 	echo "</div><br/>";

?>

<div class='video-wrapper'>
  <video playsinline="playsinline" autoplay="autoplay" width="1000px" height="400px" muted="muted" loop="loop">
    <source src="<?php echo $video_url;?>" type="video/mp4">
  </video>
</div>
</div>
</div>

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <p>
        	
     <?php
        	echo $course['course_description'];
        	?>
        </p>
        
      </div>
    </div>
  </div>
</section>
<?php
}
?>
	 	
	




		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type='text/javascript'>
		var baseURL= "<?php echo site_url();?>";
		 var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
		</script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>asset/js/courses.js?v=<?php echo time();?>"></script>
				<script src="<?php echo base_url();?>asset/js/custom.js?v=<?php echo time();?>"></script>
		
		
	 <footer>
	 </footer>
	</body>

</html>


