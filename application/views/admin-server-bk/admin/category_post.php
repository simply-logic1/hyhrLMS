<div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

               <div class="page-title">
               <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">

                <h3>Category :  <?php echo $course_name['category_name'];?></h3>

              </div>

         



           

            </div>





             <!-- form start -->

               <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="">

                   

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    <br />

                   <?php 

       

         ?>

       



    



<!-- Content Panel -->



<ul class="nav nav-tabs">

  <li class="active"><a data-toggle="tab" href="#file">Blog</a></li>

  <li><a data-toggle="tab" href="#yt_link">Videos</a></li>

 

</ul>



<div class="tab-content">
<div id="file" class="tab-pane fade in active">
<?php 


 
?>
<div class="text-left " style=" margin-top:40px;">
<?php

 
                      $i=1;
                      $this->load->helper('secure');
                      $baseurl=base_url('asset/course_content');
                      foreach($posts as $key=>$post)
                      {   
                       if($post['thumbnail_image']!='')
                       {
                        $img_path=$baseurl."/".$post['thumbnail_image'];
                       }
                       else
                       {
                        
                        $img_path=$baseurl."/default.jpg";
                       }
           
               
  

      if($key%3==0)
      {
        echo "<div class='row'>";
      }
      $id=encrypt_url($post['id']);

                        ?>

<div class="col-sm-4 post_modal" id="post_modal" style="display:flex; flex:1;">
<input type="hidden" name="title" id="title"  value="<?php echo $post['course_title'];?>">
  <input type="hidden" name="filename" id="filename" value="<?php echo $post['course_filename'];?>">
  <div  class="post_modal_dg">
  

<div class="text-center">
<img src="<?php echo $img_path;?>" alt="Video_image" class="img-responsive">
<hr>
</div>
<div class="text-left">
<h2 style="color:#fff;"><a href="<?php echo base_url('admin/content/'.$id);?>"><?php echo $post['course_title'];?></a></h2>

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
   </div>

  

  <div id="yt_link" class="tab-pane fade">
  <div class="text-left " style=" margin-top:40px;">
<?php

 
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
            $img_path=$baseurl."/".$course['thumbnail_image'];
               
   }

      if($key%3==0)
      {
        echo "<div class='row'>";
      }
                        ?>

<div class="col-sm-4 vide_model" id="video_model" style="display:flex; flex:1;">
<input type="hidden" name="title" id="title"  value="<?php echo $course['course_title'];?>">
  <input type="hidden" name="filename" id="filename" value="<?php echo $course['course_filename'];?>">
  <div style="background:#5a819a; margin:0 20px; padding:15px;">
  

<div class="text-center">
<img src="<?php echo $img_path;?>" alt="Video_image" class="img-responsive">
<hr>
</div>
<div class="text-left">
<h2 style="color:#fff;"><?php echo $course['course_title'];?></h2>

</div>
<div class="text-right">
<button type="button" class="btn btn-warning" id="assign_video_emp"   >Assign Ambassadors</button>
<a href="<?php echo base_url('admin/del_video/'.$sid);?>"><i class="btn btn-danger btn-sm fa fa-trash" name="del_video" id="del_video"></i></a>

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

  

</div>







  

      </div>

                    

                 



          </div>

        </div>

     