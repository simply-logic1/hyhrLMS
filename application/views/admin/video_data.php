   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->
 <!-- Page Heading -->
 <div class="row">
        <h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Video</h1>
        <div class="col-lg-6 text-right align-items-center justify-content-end mb-4">
        
        <?php
                 
                 $id=$content_id;
                  
                ?>
                  <a onclick="window.history.back();"  name="back_btn" id="back_btn"  class="custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
        
</div>
</div>
<div class=" card-main-div col-lg-12">

                            <div class="card shadow-cs position-relative">
                            <div class="card-header">
                                     <?php

echo "<div class='blog_header'><div class='blog_title'>";
echo '<h2>'.$content['course_title'].'</h2>';

echo "</div></div>"; 
?>
                                </div>
                                 
                                <div class="card-body">
                                <div class="alert alert-success" role="alert" id="success_message" style="display:none">Ambassador Deleted Successfully</div>
                                 
                                <?php
                      $msg=$this->session->flashdata('msg');
                     if(isset($msg))
                     {
                      $message = $this->session->flashdata('msg');
                      ?>
                      <div class="alert alert-success"><?php echo $message; ?></div>

                      <?php
                      unset($_SESSION['msg']);
                     }
                     $new_string = preg_replace('#<img.+?src="([^"]*)".*?/?>#i', "<img    src='../../asset/course_content/$1'>", $content['course_description']);
                     $baseurl=base_url('asset/course_content');
                  $img_path=$baseurl."/".$content['thumbnail_image'];
                  $yt_url = $content['course_filename'];
                  $url_parsed_arr = parse_url($yt_url);
                  if ($url_parsed_arr['host'] == "www.youtube.com" && $url_parsed_arr['path'] == "/watch" && substr($url_parsed_arr['query'], 0, 2) == "v=" && substr($url_parsed_arr['query'], 2) != "") {
                      
                      $url = $content['course_filename'];
                      parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array );
                       
                      $video_path= "//www.youtube.com/embed/".$my_array['v'];
                  } else {
                    $video_path=$baseurl."/".$content['course_filename'];
                  }
                  
                  echo "<div class='publish_date'>";

                  echo "Published on ". $content['created_on'];
               
                  echo "</div>";
                  echo "<div class='category '>";
                    $cat_array=explode(',',$content['category']);
                   
                    echo "Categories : "; 
                    $this->load->helper('secure');
                 
                  
                  foreach($category as $cat)
                  {
                     foreach($cat_array as $arr)
                     {

                       if($arr==$cat['id'])
                       {
                         $sid=encrypt_url($cat['id']);
                         echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("admin/category/".$sid).'"class="view_category is_btn_link">'.$cat['category_name']."</button>,";
                       }
                        
                     }

                  }
                
                  echo "</div>";
                  if($content['thumbnail_image']!='')
                  {
                  echo "<div class='featured_img_view'>";
                  echo ' <img src="'.$img_path.'" alt="featured_image" class="img-responsive">';
                  echo "</div>";
                  }
                  if($content['course_filename']!='')
                  {
                  echo "<div class='video_view'>";
                  echo'<div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="'.$video_path.'"></iframe>
                </div>';

                 
                  echo "</div>";
                  }
                  
                
                  echo  "<div class='post_content'>".$new_string."</div>";
                  echo "</div>";
                 
                     
                   ?>
                                 
                            </div>

                        </div>

 </div>