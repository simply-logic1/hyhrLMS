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
  ?>
        
		
        <table class="table table align-items-center table-flush" id="clientTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr role="row">
                          <th></th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date </th>
                          <th>Action</th>
                        
                        </tr>
                        <input type="hidden" name="tname" id="tname" value="content">
                        </thead>
                     
                        <tbody>
                             
                            
                           <?php
                     


                      $this->load->helper('secure');
                      
                      foreach($courses as $client)
                      {   

                        $this->load->helper('secure');
                        $id=encrypt_url($client['id']);

                        $cat_array=explode(',',$client['category']);
                                                 
                                                 
                      //  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
                      echo "<tr><td><input type='hidden' name='content_id' id='content_id' value='".$id."'></td><td><a href='".base_url('admin/content/'.$id)."'> ". $client['course_title']."</a></td>";
                         echo "<td>";
                       foreach($category as $cat)
                       {
                          foreach($cat_array as $arr)
                          {

                            if($arr==$cat['id'])
                            {
                              $sid=encrypt_url($cat['id']);
                              echo $cat['category_name'].",";
                            }
                             
                          }

                       }
                       echo "</td>";
                          
                        echo "<td>".$client['created_on']."</td>";
                        echo "<td>";
                        echo '<div id="course">	<input type="hidden" id="course_id" name="course_id" value="'.$id.'" >
                        <button type="button" class="custom-btn-sub nd-none d-sm-inline-block btn btn-sm   shadow-sm" id="assign_video_emp"   >Assign Ambassadors</button></div>';
                        echo "</td>";
                        echo "</tr>";
                      }
                      ?>
 
                        </tbody>
                    </table>
                      
                         
                          
                        </div>

		<?php

		 
		

  }
  echo "</div>";
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