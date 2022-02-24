
<?php

	$this->load->helper('secure');
	echo "<div class='row  '>";

	foreach($courses as $course)
	{
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
         
       $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $course['course_filename']);
 $id=encrypt_url($course['id']);
   if ($valid ) {
       $img_path='';
       $vid=explode('v=', $course['course_filename']);
       $img_path='http://img.youtube.com/vi/'.$vid[1].'/hqdefault.jpg';
       
       
       
   } else {
            $img_path=$baseurl."/".$course['thumbnail_image'];
               
   }
     
		echo "<div class='col-sm-4' style='margin-bottom:10px'>";

		
		// echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
		//$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
	
	 //    echo "<a href='".base_url('details/'.$id)."' >";
		// echo '<img class="img-fluid" src="'.$img_path.'" alt="">';
	   
		// echo "<h5>".$course['course_title']."</h5>";
		// echo "<p>Details</p></a>";
		?>
     
		<div class="courses-inner res-mg-b-30">
                            <div class="courses-title">
                                   <a href="<?php echo base_url('details/'.$id);?>" >
                                <img src="<?php echo $img_path;?>" class="img-responsive">                                
                                </a>
                                <hr>
                                <h2><?php echo $course['course_title'];?></h2>
                            </div>
                          
                      
                            <div class="buttons " id="course">
                            	<input type="hidden" id="course_id" name="course_id" value="<?php echo $id?>" >
                               
                                <button type="button" class="btn btn-warning" id="assign_video_emp"   >Assign Employee</button>
                            </div>
                        </div>
		<?php

		
		echo "</div> ";

	}
	echo "</div>";
?>
<div id="assign_video_emp_content" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">Assign Videos to Employee
                </h4>
            </div>
            <div class="modal-body modal-body-del">
            	    <div class="row">
            	    	<div class="col-sm-6">
            	    	  <label>
					      <input type="checkbox" value="all" class="check" id="checkAllEmp"> Select All
					    </label>
					</div>
            	    </div>
                
                	<div class="row">
                	<?php 

                		 $this->load->helper('secure');

                		foreach($employees as $employee)
                		{

                			$secure_id=encrypt_url($employee['id']);

                			echo "<div class='col-sm-6'><input type='checkbox' class='checkemp' id='emp_id[]' name='emp_id' value='".$secure_id."'> ";
                			echo $employee['first_name']." ".$employee['last_name'];
                			echo "</div>";
                		}
                	?>
                
 
					</div>
				            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="confirm-assign-btn" data-dismiss="modal">
                    Cancel</button>
                         <button type="button" class="btn btn-primary" id="confirm-assign-btn" data-dismiss="modal">
                    Confirm</button>
            </div>
        </div>
    </div>
</div>
<div id="confirm_assign_video_emp" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title"> completed
                </h4>
            </div>
            </div>
        </div>
    </div>