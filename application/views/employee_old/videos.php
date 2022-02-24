<?php

	$this->load->helper('secure');
     $msg=$this->session->flashdata('msg');
     if(isset($msg))
     {
    echo "<div class='row'><div class='alert alert-success'>Quiz completed</div></div>";
}


	echo "<div class='row '>";

 if(empty($courses))
 {
   echo "<div class='col-sm-12 col-md-12 text-center'>No videos</div>";
 }
   
	foreach($courses as $course)
	{

		
		   
         
	
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     	$id=encrypt_url($course['id']);
		
  $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $course['course_filename']);
 $id=encrypt_url($course['id']);
   if ($valid ) {
       $img_path='';
       $vid=explode('v=', $course['course_filename']);
       $img_path='http://img.youtube.com/vi/'.$vid[1].'/hqdefault.jpg';
       
       
       
   } else {
            $img_path=$baseurl."/".$course['thumbnail_image'];
               
   }
		
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		//$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
		// $img_path=base_url('asset/img/p1.jpg');
	 //    echo "<a href='".base_url('details/'.$id)."' >";
		// echo '<img class="img-fluid" src="'.$img_path.'" alt="">';
	   
		// echo "<h5>".$course['course_title']."</h5>";
		// echo "<p>Details</p></a>";
   if($course['course_filename']!='')
   {
    echo "<div class='col-sm-4'>";
		?>
        
		
		<div class="courses-inner res-mg-b-30">
                            <div class="courses-title">
                            	<a href="<?php echo base_url('video_details/'.$id);?>" >
                                <img src="<?php echo $img_path;?>" alt="" class="img-responsive">                                
                                 </a>
                                 <hr>
                                 <h2><?php echo $course['course_title'];?></h2>
                            </div>
                          
                      
                            <div class="buttons">
                            	<input type="hidden" id="course_id" name="course_id" value="<?php echo $id?>" >
                                
                                	

                                
                                <?php
                              
                                		if($course['video_status']=="completed")
									{
							         
                                       echo '<a href="'.base_url('library/take_test/'.$id.'').'"     name="take_test" id="take_test" class="pull-right btn btn-warning">Take Quiz</a>';
									}
									?>
                                
                            </div>
                          
                        </div>

		<?php

		}//if else
		echo "</div>";

	}
	echo "</div>";
?>
<div id="test_page" class="modal fade" role="dialog">
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