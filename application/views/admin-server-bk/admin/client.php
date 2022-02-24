


      <div class="right_col" role="main" style="min-height: 1381px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ambassadors </h3>
              </div>
              <div class="title_right">
             
               <a class="btn btn-warning pull-right" href="<?php echo base_url('admin/add_partner');?>" name="add_partner" id="add_partner" >Add Ambassador</a>
               <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myModal"  name="invite_partner" id="invite_partner" >Invite Ambassador</button>
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
        
                    <table id="clientTable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
                          <th></th>
                          <th>Name
                          </th>
                          <th>Email </th>
                          <th>Mobile</th>
                        
                        </tr>
                        <input type="hidden" name="tname" id="tname" value="client">
                      </thead>

          <tbody>   
                       
                      <?php
                     


                      $this->load->helper('secure');
                      
                      foreach($clients as $client)
                      {   

                        $this->load->helper('secure');
                        $id=encrypt_url($client['id']);

                      
                                                 
                                                 
                      //  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
                      echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/employee/'.$id)."'> ".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";
                        echo "<td>".$client['primary_mail']."</td>";
                        
                        echo "<td>".$client['phone_no']."</td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                    </table>
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
        <h4 class="modal-title">Invite Ambassador</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-success" id="invite_alert" style="display:none">
          <p id="invite_msg"></p>
        </div>
          
      <input id="invite_emp_email" class="form-control" placeholder="Email Id" name="invite_emp_email" type="email" required="required">
       <p id="invite_error" class="error"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="send_invite_emp" id="send_invite_emp" >Send</button>
      </div>
    </div>

  </div>
</div>