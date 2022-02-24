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
                            <h2 class="content-header-title float-start mb-0">Ambassador Education
</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a  href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a  href="  <?php echo base_url('education/');?>">Ambassador Education
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
                            <a href="<?php echo base_url('library/take_test/'.$vid);?>" class="btn-icon btn btn-primary btn-round btn-sm " type="button"  aria-haspopup="true" aria-expanded="false"> Take Test</a>
                          
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
                          $baseurl="https://res.cloudinary.com/hyhr-inc/image/upload/Hyhr_lms";
		      
      if(($course_det[0]['thumbnail_image']=='none')||($course_det[0]['thumbnail_image']==''))
      {
       $img_path= $baseurl."/xfdl6tcpbpazfwn9kfhr.png";
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
                                   <!-- <img src=" <?php //echo $img_path;?>" class="img-fluid card-img-top card-blog-top-img" alt="Blog Detail Pic" />-->
                                    <?php
echo cl_image_tag($img_path,

array(

    "height"=>300,
    "width"=>750,
     
    "crop"=>"fill",
     
    

     

    

));

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
                                          // echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>,";
                                          echo '  <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span> </button>";
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
                        <div class="blog-search">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" placeholder="Search here" />
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="search"></i>
                                </span>
                            </div>
                        </div>
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