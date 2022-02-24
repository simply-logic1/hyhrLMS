   <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Category </h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item  ">Category
                                    </li>
                                  
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="content-body">
                <!-- Examples -->
               

                  <!-- Basic tabs start -->
                  <section id="basic-tabs-components">
                    <div class="row match-height">
                        <!-- Basic Tabs starts -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> <?php  
                            
                            
                            
                            echo $courses[0]['category_name'];?></h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">Education Material</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">Videos</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false">Document</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                                            <!-- Card layout -->
                <section class="card-layout">
              
                  

                    <div class="row match-height row-cols-1 row-cols-md-3 mb-2">
                        <?php
						$this->load->helper('secure');
     $msg=$this->session->flashdata('msg');
        if(empty($courses))
 {
   echo "<div class='col-sm-12 col-md-12 text-center'>No videos</div>";
 }
  
	foreach($courses as $course)
	{
    

        if($course['course_type']=='post')
        {
 
    $id=encrypt_url($course['id']);
    $baseurl1=base_url('asset/img/logo.png');
    $baseurl="https://res.cloudinary.com/hyhr-inc/image/upload/Hyhr_lms";

  
  if(($course['thumbnail_image']=='')|| ($course['thumbnail_image']=='none'))
  {
    
    $img_path="https://res.cloudinary.com/hyhr-inc/image/upload/Hyhr_lms/xfdl6tcpbpazfwn9kfhr.png";
  }
  else
  {
    $img_path=$baseurl."/".$course['thumbnail_image'];
    
  
  }
  
	   ?>
                        <div class="col blog-padding">
                            <div class="card h-100 blog-img">
                               	<a href="<?php echo base_url('content_details/'.$id);?>" > <img class="card-img-top img-fluid"  src="<?php echo $img_path;?>" alt="Card image cap" /></a>
                                <div class="card-body">
                                    <h4 class="card-title">	<a class="blog-title-truncate text-body-heading" href="<?php echo base_url('content_details/'.$id);?>" ><?php echo $course['course_title'];?></a></h4>
                                 <!--   <div class="d-flex">
                                            
                                            <div class="author-info">
                                                <small class="text-muted me-25">by</small>
                                                <small><a href="#" class="text-body">Admin</a></small>
                                                <span class="text-muted ms-50 me-25">|</span>
                                                <?php 
                                       //  $timestamp1= strtotime($course['created_on']); 
                                         //$new_date1 = date('M d,Y', $timestamp1);
                                    
                                     ?> 
                                                <small class="text-muted"><?php  echo  $new_date1;?> </small>
                                            </div>
                                        </div>-->
                                   
                                    <?php
                                     $cat_array=explode(',',$course['category']);
                                            
                                  if($course['category'] !='')
                                  {
                                    echo '<div class="my-1 test py-25">';
                                      $this->load->helper('secure');
                                   
                                    
                                    foreach($category as $cat)
                                    {
                                       foreach($cat_array as $arr)
                                       {
                  
                                         if($arr==$cat['id'])
                                         {
                                           $sid=encrypt_url($cat['id']);
                                         //  echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>";
                                         echo '  <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span> </button>";
                                         }
                                          
                                       }
                  
                                    }
                                    echo "</div>";
                                   }



?> 
                                      
                              
                                        <?php
                                      
                                       if($course['course_description'] !='')
                                       {
                                       $sub_descr= strip_tags($course['course_description']); 
                                           echo '<p class="card-text blog-content-truncate">'.substr($sub_descr,0,80).'...<a href="'.base_url('content_details/'.$id).'" >Read more</a></p>';
                                       }
                               
    
    ?> 
                            <div class="buttons">
                            	<input type="hidden" id="course_id" name="course_id" value="<?php echo $id?>" >
                                
                                	

                                
                           
                                
                            </div>
                                    </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                  
                                  <a href="page-blog-detail.html#blogComment" class="text-muted">
                                              <div class="d-flex align-items-center">
                                              Assigned on <?php 
                                       $timestamp = strtotime($course['assign_date']); 
                                       $new_date = date('M d,Y', $timestamp);
                                  
                                  echo  $new_date;?>
                                              </div>
                                          </a>
                     <?php  
                                  if($course['video_status']=="completed")
                {
                  
             
                     
                                     echo '<a href="'.base_url('library/take_test/'.$id.'').'"     name="take_test" id="take_test" class="pull-right btn btn-warning">Take Quiz</a>';
                }
                ?>
                              </div>
                            </div>
                        </div>
						
			<?php
   } //if condition
}
	
	?>
                    </div>
                </section>
                <!--/ Card layout -->
                                        </div>
                                        <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                                        <!-- Card layout -->
                <section class="card-layout">
              
                  

              <div class="row row-cols-1 row-cols-md-3 mb-2">
                  <?php
                  $this->load->helper('secure');
$msg=$this->session->flashdata('msg');
  if(empty($courses))
{
echo "<div class='col-sm-12 col-md-12 text-center'>No videos</div>";
}
 
foreach($courses as $course)
{
  if($course['course_type']=='video')
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
 
 
 
} else{

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
  
  // echo "<video   width='400' heigth='400' controls> <source src='".$video_url."' >I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.</video> ";
  //$img_path=base_url('asset/course_video/video_thumb/').$course['thumbnail_image'].'.png';
  // $img_path=base_url('asset/img/p1.jpg');
//    echo "<a href='".base_url('details/'.$id)."' >";
  // echo '<img class="img-fluid" src="'.$img_path.'" alt="">';
 
  // echo "<h5>".$course['course_title']."</h5>";
  // echo "<p>Details</p></a>";
if($course['course_filename']!='')
{
     
 ?>
                  <div class="col mb-4">
                      <div class="card h-100 blog-img">
                      <a href="<?php echo base_url('video_details/'.$id);?>" > <img class="card-img-top img-fluid"  src="<?php echo $img_path;?>" alt="Card image cap" /></a>
                          <div class="card-body">
                              <h4 class="card-title"><a class="blog-title-truncate text-body-heading" href="<?php echo base_url('video_details/'.$id);?>" ><?php echo $course['course_title'];?></a></h4>
                          <!--    <div class="d-flex">
                                      
                                      <div class="author-info">
                                          <small class="text-muted me-25">by</small>
                                          <small><a href="#" class="text-body">Admin</a></small>
                                          <span class="text-muted ms-50 me-25">|</span>
                                          <?php 
                                  // $timestamp1= strtotime($course['created_on']); 
                                  // $new_date1 = date('M d,Y', $timestamp1);
                              
                               ?> 
                                          <small class="text-muted"><?php  //echo  $new_date1;?> </small>
                                      </div>
                                  </div>-->
                             
                              <?php
                               $cat_array=explode(',',$course['category']);
                                      
                            if($course['category'] !='')
                            {
                              echo '<div class="my-1 py-25">';
                                $this->load->helper('secure');
                             
                              
                              foreach($category as $cat)
                              {
                                 foreach($cat_array as $arr)
                                 {
            
                                   if($arr==$cat['id'])
                                   {
                                     $sid=encrypt_url($cat['id']);
                                   //  echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>";
                                   echo ' <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span> </button>";
                                   }
                                    
                                 }
            
                              }
                              echo '</div>';
                              
                             }



?> 
                                  
                                   <?php
                                 
                             if($course['course_description'] !='')
                             {
                                 echo '<p class="card-text blog-content-truncate">'.substr($course['course_description'],0,80).'...<a href="'.base_url('video_details/'.$id).'" >Read more</a></p>';
                             }
                     

?>
                
                      <div class="buttons">
                          <input type="hidden" id="course_id" name="course_id" value="<?php echo $id?>" >
                          
                              

                          
                     
                          
                      </div>
                              
                          </div>
                          <div class="card-footer d-flex justify-content-between align-items-center">
                            
                              <a href="page-blog-detail.html#blogComment" class="text-muted">
                                          <div class="d-flex align-items-center">
                                          Assigned on <?php 
                                   $timestamp = strtotime($course['assign_date']); 
                                   $new_date = date('M d,Y', $timestamp);
                              
                              echo  $new_date;?>
                                          </div>
                                      </a>
                                   <?php  
                                  if($course['video_status']=="completed")
                              {
              
         
                               
                                 echo '<a href="'.base_url('library/take_test/'.$id.'').'"     name="take_test" id="take_test" class="pull-right btn btn-warning">Take Quiz</a>';
                              }
                              ?>
                          </div>
                      </div>
                  </div>
                  
      <?php
}

} //if cpondoition
}
?>
              </div>
          </section>
          <!--/ Card layout -->
                                        </div>
                                        <div class="tab-pane" id="about" aria-labelledby="about-tab" role="tabpanel">
                                           
                <!-- Multilingual -->
                <section id="multilingual-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title"> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table id="docTable" class="dt-multilingual table">
                                        <thead>
                                            <tr>
                                                 <th> Title </th>
                          <th> Category</th>
                          <th>Date</th>
                          <th>Download</th>
                                            </tr>
                                        </thead>
										<tbody>
										 <?php

$this->load->helper('secure');
 
                      
foreach($courses as $client)
{
  if($client['course_type']=='document')
  {
    print $course['course_type'];
  $this->load->helper('secure');
  $id=encrypt_url($client['id']);


$docUrl=base_url('asset/course_content/'.$client["course_filename"]);
                           
//  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
echo "<tr> <td> ".ucwords($client['course_title']) ." </td>";
echo "<td>";
 
$cat_array=explode(',',$client['category']);
       
if($client['category'] !='')
{
echo '<div class="my-1 py-25">';
 $this->load->helper('secure');


foreach($category as $cat)
{
  foreach($cat_array as $arr)
  {

    if($arr==$cat['id'])
    {
      $sid=encrypt_url($cat['id']);
     // echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>";
     echo '  <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span> </button>";
    }
     
  }

}
echo "</div>";
}


 
 
echo "</td>";
$timestamp1= strtotime($client['created_on']); 
$new_date1 = date('M d,Y', $timestamp1);
  
  echo "<td>".$new_date1."</td>";
  echo "<td>";
  ?>
  <a href="<?php echo $docUrl; ?>" download="<?php echo $client['course_filename'];?>">Download</a>
  <?php
  
 echo "</td>";
  echo "</tr>";
}//if condition 
}
?>
 
                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Multilingual -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Tabs ends -->

                     
                    </div>
                </section>
                <!-- Basic Tabs end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->