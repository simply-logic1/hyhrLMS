
   
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
        <h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Media</h1>
        <div class="col-lg-6 text-right align-items-center justify-content-end mb-4">
        
      
        <button type="button" data-toggle="modal" data-target="#myModal"  class="custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Media</a>
        
</div>
</div>
        <!-- DataTales Example -->
        <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">
              
            <div class="alert alert-success" role="alert" id="success_message" style="display:none">Media Deleted Successfully</div>
            <?php
               $msg=$this->session->flashdata('media-msg');
               if(isset($msg))
               {
                $message = $this->session->flashdata('media-msg');
                ?>
                <div class="alert alert-success"><?php echo $message; ?></div>

                <?php
               }



 
$i=1;
$this->load->helper('secure');
 
foreach($media as $client)
{   
  if($client['media_type']=='')
  {

  $this->load->helper('secure');
  $id=encrypt_url($client['id']);
  $baseurl=base_url('asset/course_content');


if($key%3==0)
{
echo "<div class='row'>";
}
  ?>

            

<div class="col-lg-4  ">
 
    <!-- Default Card Example -->
    <div class="card mb-4">
        <div class="card-header">
        <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $client["filename"]; ?>" >
           
            <img src="<?php echo $baseurl."/".$client['filename'];?>"  alt="Video_image" class=" img-fluid img-responsive">
        </a>
       
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
?>
            </div>
        </div>
 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Add Media</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="alert alert-success" id="invite_alert" style="display:none">
          <p id="invite_msg"></p>
        </div>
        <input id="media_add"  class="form-control" type="file" name="media_add" multiple="">
       <p id="invite_error" class="error"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="add_media" id="add_media" >Add</button>
      </div>
    </div>

  </div>
</div>