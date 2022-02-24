


      <div class="right_col" role="main" style="min-height: 1381px;">
          <div class="">
            <div class="page-title">
            <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">
                <h3> Ambassador Education </h3>
              </div>
              <div class="title_right">
                <?php
                 
                 $id=$content_id;
                 
                ?>

              <a type="button"  href="<?php echo base_url('admin/edit_content/'.$id);?>" class="btn btn-info btn-sm text-right" >Edit </a>
              </div>
              

           
            </div>
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

                     
                   ?>
                   <div class="clearfix"></div>
                   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="">
                  
               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="alert alert-success" role="alert" id="success_message" style="display:none">Ambassador Deleted Successfully</div>
        
                       <?php 
                       /*
                       $variable_with_article_content = 'TEST WITH<img class="aligncenter" style="display: block;margin-left:auto;margin-right:auto;" src="http://img.zszywka.com/0/0269/w_0980/moj-swiat/muza-2013-najnowsze-eska-hity-2013-.jpg" width="642" />';
                       $finalContent = preg_replace_callback('/' . 'src="(.*?)"' . '/', 
                       function($match) { return 'src="' . str_replace('img.zszywka.com', 'EXMAPLE.COM', $match[1]) . '"'; }, $variable_with_article_content);
                       
                       echo $finalContent;
                    $post = "This is my text with http://www.google.com and some image http://www.domain.com/somewebimage.png";

                    # the pattern is very basic and can be improved to handle more complicated URLs
                    $pattern = '~\b(?:ht|f)tps?://[a-z0-9.-]+\.[a-z]{2,3}(?:/\S*)?~i';
                    $imgExt = ['.png', '.gif', '.jpg', '.jpeg'];
                    $callback = function ($m) use ($imgExt) {
                        if ( false === $extension = parse_url($m[0], PHP_URL_PATH) )
                            return $m[0];
                    
                        $extension = strtolower(strrchr($extension, '.'));
                    
                        if ( in_array($extension, $imgExt) )
                            return '<img src="' . $m[0] . '" width="300" style="float: right;">';
                        # better to do that via a css rule --^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        return '<a href="' . $m[0] . '" target="_blank">' . $m[0] . '</a>'; 
                    };
                    
                    $result = preg_replace_callback($pattern, $callback, $post);
                    print $result;
                    
                    $str ="term
Test test test <img src='abc.png' alt='begin'> test test <img src='123.png' alt='end'> test test
term";

preg_match_all('/<img.*?alt=[\'"](\d+)[\'"]>/', $str, $matches, PREG_SET_ORDER, 0);

foreach($matches as $val) {                
    $str = preg_replace('/<img.*?alt=[\'"](' . $val[1] . ')[\'"]>/', '<id>'.$val[0].'</id>', $str);
}

var_dump($str);

$string = 'Some text <img alt="bar" title="foo" src="http://example.com/example.jpg" style="width:200px;height:400px;" /> Some text <img alt="bar1" title="foo" src="http://example.com/example1.jpg" style="width:200px;height:400px;" />';


var_dump($new_string);
                      */
                      $new_string = preg_replace('#<img.+?src="([^"]*)".*?/?>#i', "<img    src='../../asset/course_content/$1'>", $content['course_description']);
                           $baseurl=base_url('asset/course_content');
                        $img_path=$baseurl."/".$content['thumbnail_image'];
                        $video_path=$baseurl."/".$content['course_filename'];
                        echo "<div class='blog_header'><div class='blog_title'>";
                       echo '<h2>'.$content['course_title'].'</h2>';
                     
                       echo "</div>"; 
                       echo "<div class='publish_date'>";

                       echo "Published on". $content['created_on'];
                    
                       echo "</div>";
                       echo "<div class='category '>";
                         $cat_array=explode(',',$content['category']);
                        
                         echo "Categories:"; 
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
                       echo "<div class='featured_video_view'>";
                       echo '<video width="320" height="240" controls>
                       <source src="'.$video_path.'"  >
                       
                     Your browser does not support the video tag.
                     </video>';
                       echo "</div>";
                       }


                       echo "</div>";
                       echo  $new_string;


?>
                </div>
              </div>

              

              

              

              

              
            </div>

          
          </div>
        </div>
        <div id="del_cenmodel" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">Confirmation
                </h4>
            </div>
            <div class="modal-body modal-body-del">
                <p class="modal-body-del">Are you sure you want to Ambassadors ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="confirm-cancel-btn" data-dismiss="modal">
                    Cancel</button>
                         <button type="button" class="btn btn-danger" id="confirm-del-btn" data-dismiss="modal">
                    Confirm</button>
            </div>
        </div>
        
    </div>
</div>
 