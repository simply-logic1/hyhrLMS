   <!-- BEGIN: Content-->
   <?php

	$this->load->helper('secure');
     $msg=$this->session->flashdata('msg');
      

     $vid=encrypt_url($course_det[0]['id']);
     
  ?>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Videos
</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a  href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a  href="  <?php echo base_url('library-list/');?>">Videos
</a>
                                    </li>
                                    <li class="breadcrumb-item active"> <?php echo $course_det[0]['course_title'];?>
                                    </li>
                                     
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown"> 
                        <input id="test_status" type="hidden" class="test_status" value="<?php echo $test_status['status'];?>">
                        <?php 


 if($test_status['status']=='completed')
 {
     ?>
                            <a href="<?php echo base_url('library/take_test/'.$vid);?>" class="btn-icon btn btn-primary }
                            btn-round btn-sm " type="button"  aria-haspopup="true" aria-expanded="false"> Take Test</a>
 <?php
 }
 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog Detail -->
                    <div class="blog-detail-wrapper">
					<?php
                   
					
					if(isset($msg))
 {
echo "<div class='row'><div class='alert alert-success'>Quiz completed</div></div>";
}
 if(empty($course_det))
 {
   echo "<div class='col-sm-12 col-md-12 text-center'>No videos</div>";
 }
                        
						  $baseurl=base_url('asset/course_content');
     	$video_url=$baseurl."/".$course_det[0]['course_filename'];
		      
      if(($course_det[0]['thumbnail_image']=='none')||($course_det[0]['thumbnail_image']==''))
      {
       $img_path= base_url('asset/img/logo.png');
      }
  
    else
    {
            $img_path=$baseurl."/".$course_det[0]['thumbnail_image'];
    }
					?>
					<div class="row">
                            <!-- Blog -->
                            <div class="col-12"> 
                                <div class="card">
                                    
                                    <?php
									$video_sec= strtotime($view_video_length) - strtotime('today'); //125
echo "<input type='hidden' id='video_ratio' name='video_ration' value='".$video_sec."'>	";
   foreach($course_det as $course)
	{
        $id=encrypt_url($course['id']);
           echo ' <input type="hidden" id="vid" name="vid" value="'.$id.'" >';
          
       $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
               $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $course['course_filename']);
       
   }
 
   if ($valid ) {
       $img_path='';
       
       $videoId=explode('v=',$course['course_filename']);
           
           
           
       ?>
       <div class='videoWrapper'>
       <div id="player"></div>
       </div>
       <input type="hidden" name="yt_id" id="yt_id" value="<?php echo $videoId[1];?>" >
       <input type="hidden" name="video_type" id="video_type" value="yt" >
       
       
            
            
       <?php
          echo "<input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
	 
       
   } else {
            $img_path=$baseurl."/".$course['thumbnail_image'];
                
     
	 echo '<input type="hidden" name="video_type" id="video_type" value="video" >';

			$id=$course_id;
		 
			$img_path=base_url('asset/img/p1.jpg');

	     $baseurl=base_url('asset/course_video');
     	$video_url=$baseurl."/".$course['course_filename'];
     
		
		
	
		
	
		
	   
 
			echo "<div class='video-wrapper'>	
			    <video   src='".$video_url."'  controlsList='nodownload' controls>	</div>


				";
		
		echo " 
		 <input type='hidden' name='course_id' id='course_id' value='".$course_id."'>";
		 
		
	
   }
 
    
  
	 
?>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $course_det[0]['course_title'];?></h4>
                                        <div class="d-flex">
                                             
                                            <div class="author-info">
                                                <small class="text-muted me-25">by</small>
                                                <small><a href="#" class="text-body">Admin</a></small>
                                                <span class="text-muted ms-50 me-25">|</span>
                                                <small class="text-muted"><?php 
                                                 
                                                $timestamp1= strtotime($course_det[0]['created_on']); 
                                                $new_date1 = date('M d,Y', $timestamp1);
                                                echo $new_date1;?></small>
                                            </div>
                                        </div>
                                        <div class="my-1 py-25">
                                            <?php
                                     $cat_array=explode(',',$course_det[0]['category']);
                                            
                                  if($course_det[0]['category'] !='')
                                  {
                                      
                                      $this->load->helper('secure');
                                   
                                    
                                    foreach($category as $cat)
                                    {
                                       foreach($cat_array as $arr)
                                       {
                  
                                         if($arr==$cat['id'])
                                         {
                                           $sid=encrypt_url($cat['id']);
                                         //  echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>,";
                                         echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>";
                                         }
                                          
                                       }
                  
                                    }
                                    
                                   }



?> 
                                        </div>
                                        <p class="card-text mb-2">
                                       <?php echo $course_det[0]['course_description'];?>
                                        </p>
                                         
                                      
                                        <hr class="my-2" />
                                        
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Blog -->

                          

                         
                        </div>
                    </div>
                    <!--/ Blog Detail -->

                </div>
            </div>
            <div class="sidebar-detached sidebar-right">
                <div class="sidebar">
                    <div class="blog-sidebar my-2 my-lg-0">
                        <!-- Search bar -->
                        <!--<div class="blog-search">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" placeholder="Search here" />
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="search"></i>
                                </span>
                            </div>
                        </div> -->
                        <!--/ Search bar -->

                     <!-- Recent Posts -->
                     <div class="blog-recent-posts mt-3">
                            <h6 class="section-label">Recent Posts</h6>
                            <div class="mt-75">
                            <?php 
          foreach($videos as $video)
                            {

                                if(($video['thumbnail_image']=='none')||($video['thumbnail_image']==''))
                                {
                                 $img_path= base_url('asset/img/logo.png');
                                }
                            
                              else
                              {
                                      $img_path=$baseurl."/".$video['thumbnail_image'];
                              }
                                  
                                ?>
                                <div class="d-flex mb-2">
                                    <a href="page-blog-detail.html" class="me-2">
                                        <img class="rounded" src="<?php echo $img_path;?>" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="blog-info">
                                        <h6 class="blog-recent-post-title">
                                            <a href="page-blog-detail.html" class="text-body-heading"><?php echo $video['course_title'];?></a>
                                        </h6>
                                        <div class="text-muted mb-0">
                                        <?php 
                                                 
                                                $timestamp= strtotime($video['created_on']); 
                                                $new_date= date('M d,Y', $timestamp1);
                                                echo $new_date;?>
                                        
                                        </div>
                                    </div>
                                </div>
                               <?php

                            }
                            ?>
                            </div>
                        </div>
                        <!--/ Recent Posts -->

                        <!-- Categories -->
                        <div class="blog-categories mt-3">
                            <h6 class="section-label">Categories</h6>
                            <div class="mt-1">
                               <?php
                                foreach($category as $cat)
                                {
                                    ?>
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="#" class="me-75">
                                        <div class="avatar bg-light-info rounded">
                                            <div class="avatar-content">
                                                <i data-feather="hash" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="blog-category-title text-body"><?php echo $cat['category_name'];?></div>
                                    </a>
                                </div>
                               <?php

                                }
                                ?>
                            </div>
                        </div>
                        <!--/ Categories -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    

    <div class="modal fade text-start modal-primary" id="take_test_emp" tabindex="-1" aria-labelledby="myModalLabel160" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel160">Take Quiz</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Thanks for watching the video.  Would you like to take the quiz now?
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="test-cancel-btn" data-dismiss="modal">
                    Later</button>
                         <button type="button" class="btn btn-primary" id="test-confirm-button" data-dismiss="modal">
                    Confirm</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>