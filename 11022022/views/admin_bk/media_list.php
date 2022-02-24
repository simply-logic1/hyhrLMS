


      <div class="right_col" role="main" style="min-height: 1381px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Media </h3>
              </div>
              <div class="title_right">
              <button type="button" class="btn btn-info btn-sm text-right" data-toggle="modal" data-target="#myModal">Add Media</button>
              </div>
              

           
            </div>
                  <?php
                      $msg=$this->session->flashdata('media-msg');
                     if(isset($msg))
                     {
                      $message = $this->session->flashdata('media-msg');
                      ?>
                      <div class="alert alert-success"><?php echo $message; ?></div>

                      <?php
                     }

                     
                   ?>
                   <div class="clearfix"></div>
                   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="">
                  
               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content media_content">
                    <div class="alert alert-success" role="alert" id="success_message" style="display:none">Media Deleted Successfully</div>
                    <div class="row">
                      <?php
                        
                      foreach($media as $client)
                      {   

                        $this->load->helper('secure');
                        $id=encrypt_url($client['id']);
                        $baseurl=base_url('asset/course_content');
                        ?>

                        <div class="col-sm-3">
                            <img src="<?php echo $baseurl."/".$client['filename'];?>" alt="<?php   echo $client['media_title']; ?>"   >
                        </div>
                        <?php

                      }
                      
                                 ?>                
                                                 
                      </div> <!-- row eof -->
                       
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Media</h4>
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