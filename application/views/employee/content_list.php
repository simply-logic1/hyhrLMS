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
                            <h2 class="content-header-title float-start mb-0">Ambassador Education </h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ambassador Education 
                                    </li>
                                  
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="content-body">
                <!-- Examples -->
               

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
                           <!-- <div class="img-box">
                               	<a href="<?php echo base_url('content_details/'.$id);?>" > <img class="card-img-top img-fluid"  src="<?php echo $img_path;?>" alt="Card image cap" /></a>
                                   </a>
                                   </div>-->
                                   <?php
echo cl_image_tag($img_path,

array(

    "height"=>250,
    "crop"=>"scale"

     

    

));

                                   ?>
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
                                         echo '  <a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span> </a></button>";
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
   }
	
	?>
                    </div>
                </section>
                <!--/ Card layout -->

            </div>
        </div>
    </div>
    <!-- END: Content-->