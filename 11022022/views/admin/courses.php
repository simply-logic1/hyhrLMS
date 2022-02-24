
   
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
        <h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Videos</h1>
        <div class="col-lg-6 text-right align-items-center justify-content-end mb-4">
        
      
        <a href="<?php echo base_url('admin/upload');?>" name="add_quiz" id="add_quiz"  class="custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add new videos</a>
        
</div>
</div>
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
        <h2 class="video_title"><?php echo '<a id="view_video" type="button" href="'.base_url("admin/view_post/".$id).'"class="view_post is_btn_link">';echo $course['course_title'];?></a></h2>
        <?php
                                   $cat_array=explode(',',$course['category']);
                                   
                               if($course['category'] !='')
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
                                        echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("admin/category/".$sid).'"class="view_category is_btn_link">'.$cat['category_name']."</a></button>,";
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
                            	<input type="hidden" id="course_id" name="course_id" value="<?php echo $id?>" >
<button type="button" class="custom-btn-sub nd-none d-sm-inline-block btn btn-sm   shadow-sm" id="assign_video_emp"   >Assign Ambassadors</button>
<a href="<?php echo base_url('admin/del_video/'.$id);?>"><i class="fa fa-trash" name="del_video" id="del_video"></i></a>

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
                    <input type="hidden" name="type" id="assign_type" class="assign_type" value="video">
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