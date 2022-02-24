 

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> Category :  <?php echo $course_name['category_name'];?></h1>
        <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">
            <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
      aria-selected="true"> Ambassador Education</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
      aria-selected="false">Videos</a>
  </li>
   
</ul>
<div class="tab-content card pt-5" id="myTabContentMD">
  <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
   <!-- DataTales Example -->
   <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">
              
            <div class="alert alert-success" role="alert" id="success_message" style="display:none">Quiz Deleted Successfully</div>
           <?php

 
                      $i=1;
                      $count=count($posts);
                      
                      if($count !=0)
                      {
                      
                      $baseurl=base_url('asset/course_content');
                      foreach($posts as $key=>$post)
                      {   
                       if($post['thumbnail_image']!='')
                       {
                        $img_path=$baseurl."/".$post['thumbnail_image'];
                       }
                       else
                       {
                         $baseurl1=base_url('asset/img/logo.png');
                        $img_path=$baseurl1;
                       }
           
               
  

      if($key%3==0)
      {
        echo "<div class='row'>";
      }
      $id=encrypt_url($post['id']);

                        ?>
						<input type="hidden" name="title" id="title"  value="<?php echo $post['course_title'];?>">
  <input type="hidden" name="filename" id="filename" value="<?php echo $post['course_filename'];?>">
						<?php
 
 


 
  ?>

            

<div class="col-lg-4 vide_model">
<input type="hidden" name="title" id="title"  value="<?php echo $course['course_title'];?>">
  <input type="hidden" name="filename" id="filename" value="<?php echo $course['course_filename'];?>">
    <!-- Default Card Example -->
    <div class="card mb-4">
        <div class="card-header">
          
            
        <img src="<?php echo $img_path;?>" alt="Video_image" class=" img-fluid img-responsive">
         
        </div>
        <div class="card-body">
        <h2 class="video_title"><a href="<?php echo base_url('admin/content/'.$id);?>"><?php echo $post['course_title'];?></a></h2>
        <?php
                                   $cat_array=explode(',',$post['category']);
                                   
                               if($post['category'] !='')
                               {
                                   echo "<p>Categories:"; 
                                   $this->load->helper('secure');
                                
                                 
                                 foreach($category as $cat)
                                 {
                                    foreach($cat_array as $arr)
                                    {
               
                                      if($arr==$cat['id'])
                                      {
                                        $sid=encrypt_url($cat['id']);
                                       // echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("admin/category/".$sid).'"class="view_category is_btn_link">'.$cat['category_name']."</a>,";
                                      }
                                       
                                    }
               
                                 }
                                 echo "</p>";
                                }
                                else
                                {
                                  echo "<p>Categories : uncategories</p>";
                                }
                                 ?>
      



</div>
        </div>
    </div>

   

</div>

 

 



<?php
 if($key%3==2)
      {
        echo "</div>";  //ROW END
      }
}

                      }
                      else
                      {
                        echo "<p class='text-center'>No Posts There</p>";
                      }
?>
            </div>
        </div>
<div id="videoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="video-title"></h4>
      </div>
      <div class="modal-body">
        <div class="modal-video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" id="video_src" src=""
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

     
  </div>
  <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
    <!-- DataTales Example -->
    <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">
              
            <div class="alert alert-success" role="alert" id="success_message" style="display:none">Quiz Deleted Successfully</div>
            <?php
              $msg=$this->session->flashdata('video-msg');
              $baseurl=base_url('asset/course_video');
           if(isset($msg))
           {
            $message = $this->session->flashdata('video-msg');
            ?>
            <div class="alert alert-success"><?php echo $message; ?></div>

            <?php
           }


 
$i=1;
$this->load->helper('secure');

 $count1=count($courses);
 if($count1 !=0)
 {
foreach($courses as $key=>$course)
{   
  $sid=encrypt_url($course['id']);
           // $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $course['course_filename']); 

  $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=[0-9A-Za-z_-]+$/", $course['course_filename']); 
$id=encrypt_url($course['id']);
if ($valid ) {
$img_path='';
$vid=explode('v=', $course['course_filename']);
$img_path='http://img.youtube.com/vi/'.$vid[1].'/hqdefault.jpg';



} else {

  $baseurl1=base_url('asset/img/logo.png');

if($course['thumbnail_image']=='none')
{
  
  $img_path=$baseurl1;
}
else
{
  $img_path=$baseurl."/".$course['thumbnail_image'];
  

}


}

if($key%3==0)
{
echo "<div class='row'>";
}
  ?>

            

<div class="col-lg-4 vide_model">
<input type="hidden" name="title" id="title"  value="<?php echo $course['course_title'];?>">
  <input type="hidden" name="filename" id="filename" value="<?php echo $course['course_filename'];?>">
    <!-- Default Card Example -->
    <div class="card mb-4">
        <div class="card-header">
          
            
        <img src="<?php echo $img_path;?>" alt="Video_image" class=" img-fluid img-responsive">
         
        </div>
        <div class="card-body">
        <h2 class="video_title"><?php echo $course['course_title'];?></h2>
        <?php
                                   $cat_array=explode(',',$content['category']);
                                   
                               if($content['category'] !='')
                               {
                                   echo "<p>Categories:"; 
                                   $this->load->helper('secure');
                                
                                 
                                 foreach($category as $cat)
                                 {
                                    foreach($cat_array as $arr)
                                    {
               
                                      if($arr==$cat['id'])
                                      {
                                        $sid=encrypt_url($cat['id']);
                                       // echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("admin/category/".$sid).'"class="view_category is_btn_link">'.$cat['category_name']."</a>,";
                                      }
                                       
                                    }
               
                                 }
                                 echo "</p>";
                                }
                                else
                                {
                                  echo "<p>Categories : uncategories</p>";
                                }
                                 ?>
        <div class="action_div"  >
<div class="text-right" id="course">
                            	<input type="hidden" id="course_id" name="course_id" value="<?php echo $sid?>" >
<button type="button" class="custom-btn-sub nd-none d-sm-inline-block btn btn-sm   shadow-sm" id="assign_video_emp"   >Assign Ambassadors</button>
<a href="<?php echo base_url('admin/del_video/'.$sid);?>"><i class="fa fa-trash" name="del_video" id="del_video"></i></a>

</div>



</div>
        </div>
    </div>

   

</div>

 

 



<?php
 if($key%3==2)
      {
        echo "</div>";  //ROW END
      }
}
 }
 else
 {
   echo "<p class='text-center'>No Videos There</p>";
 }
?>
            </div>
        </div>
<div id="videoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="video-title"></h4>
      </div>
      <div class="modal-body">
        <div class="modal-video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" id="video_src" src=""
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="assign_video_emp_content" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title">Assign Videos to Ambassador
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
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
  </div>
   
</div>
</div>
</div>

</div>
    <!-- /.container-fluid -->

 
<!-- End of Main Content -->
