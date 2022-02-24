<style>
#video_model
{
  margin-bottom:10px;
}
</style>

<div class="right_col" role="main" style="min-height: 100px;">
<div class="row">
<div class="col-md-12">
<?php
                      $msg=$this->session->flashdata('msg');
                        $baseurl=base_url('asset/course_video');
                     if(isset($msg))
                     {
                      $message = $this->session->flashdata('msg');
                      ?>
                      <div class="alert alert-success"><?php echo $message; ?></div>

                      <?php
                     }

                     
                   ?>
<div style="background:#fff;">    <h3><span style="float:left;">Videos</span>
    <span style="float:right;"><a href="<?php echo base_url('admin/upload');?>" type="button" class="btn btn-warning">Add new videos</a></span></h3>    
</div>
</div>
</div>



<!--<div class="top1">
        <div class="col-md-8 col-12  top2">
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input type="text" class="form-control" id="search" name="search" placeholder="Search">
   
    </div>
 
  </div>
        
  </div>-->
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

