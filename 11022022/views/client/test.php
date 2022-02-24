
<div class="row">
    <div class="col-sm-6">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">

 <div class="alert alert-success" id="del_alert" style="display:none" >
          <p >Deleted Complete</p>
        </div>
    </div>
</div>
</div>

    

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="sparkline13-list">

    	<div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Tests</h1>
                                </div>
                                <?php
                                $msg=$this->session->flashdata('msg');
                                if(isset($msg))
                                {
                                
                                echo '<div class="alert alert-info">'.$msg.'
                                </div>';
                            }
                                ?>
                            </div>
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                           
                            <div id="myTabContent" class="">
                                <div class=" " id="alltestlist">
                                   
                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          
         
                                    <table id="allTest"  class="table  table-bordered" style="width:100%" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                 <th  data-field="name" >Video Title</th>
                                                 <th data-field="course_description">Description</th>
                                                 
                                                 
                                                <th data-sortable="true"            data-field="Status" >Status</th>
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $this->load->helper('secure');
                                           
                                                foreach($test_list as $test)
                                               {
                                                       $test_id=encrypt_url($test['id']);
                                                       $del_id=encrypt_url($test['test_id']);
                                                    echo "<tr>";
                                                   
                                                   echo "<td><input type='hidden' name='test_id' id='test_id' value='".$del_id."'></td>";
                                                    echo "<td><a href='".base_url('test/details/'.$test_id)."'>".ucwords($test['course_title'])."</a></td>";
                                                   // echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                                                    echo "<td>".$test['course_description']."</td>";

                                                   
                                                 

                                                   
                                                    echo "<td>Active</td>";
                                                      echo "<td><a href='".base_url('test/details/'.$test_id)."'>View</a>
                                                      

                                                      </td>";

                                                    echo "</tr>";
                                               }
                                               
                                            ?>
                                           
                                        </tbody>
                                    </table>                      </div>
                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                </div>
            </div>
    </div>


        <!-- The Modal -->
<div class="modal" id="invite_emp_content">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Invite to Employee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>

      <!-- Modal body -->
      
      <div class="modal-body">

        <div class="alert alert-success" id="invite_alert" style="display:none">
          <p id="invite_msg"></p>
        </div>
          
        <div class="form">
       <input id="invite_emp_email" class="form-control" placeholder="Email Id" name="invite_emp_email" type="email" required="required">
       <p id="invite_error" class="error"></p>
   </div>
       
      </div>


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="send_invite_emp" id="send_invite_emp" >Send</button>
      </div>

    </div>
  </div>
</div>

<!-- Delete Confirm Model -->
<div id="del_empmodel" class="modal fade" role="dialog">
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
                <p class="modal-body-del">Are you sure want to delete test ?</p>
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

    
