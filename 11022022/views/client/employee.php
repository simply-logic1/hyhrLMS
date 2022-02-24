<style>
.info-box-content {
    
    margin-left: 0px;
}
.info-box {
    
    min-height: auto;
   
   }
   .emp-invite
   {
   cursor:pointer;

   }
   .info-box-content.pending-invite {
    display: inline-flex;
}

.info-box-content.pending-invite .info-box-text {
    margin-right: 10px;
}
</style>


<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-box">
                       <!-- <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>-->
                            <div class="info-box-content pending-invite">
                                <span class="info-box-text">Pending Invites :</span>
                                <span class="info-box-number"><?php echo $check_lic['invite_pending'];?> <span class="tuition-fees"></span>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 emp-invite">
                     <a id="invite_emp"  data-toggle="modal" data-target="#invite_emp_content">   
                         <div class="info-box">
                         
                            <div class="info-box-content">
                                <h2 class="info-box-text">Invite Referral</h2>                            
                            </div>
                        </div></a>
                    </div>
                   
                </div>
            </div>
        </div>
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
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#allemplist">All Referrals</a></li>
                                 <li><a href="#pending">Invite Pending</a></li>
                               
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="allemplist">
                                   
                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          
         
                                    <table id="allemp"  class="table  table-bordered" style="width:100%" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                 <th  data-field="name" >Full Name</th>
                                                 <th data-field='Primary Email'>Primary Email</th>
                                                <th  data-field="email" >Company Email</th>
                                                 
                                                <th data-sortable="true"            data-field="Status" >Status</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $this->load->helper('secure');
                                            
                                           
                                                foreach($employees as $employee)
                                               {
                                                       $emp_id=encrypt_url($employee['id']);
                                                    echo "<tr>";
                                                   
                                                   echo "<td><input type='hidden' name='emp_id' id='emp_id' value='".$emp_id."'></td>";
                                                    echo "<td><a href='".base_url('employee/details/'.$emp_id)."'>".ucwords($employee['first_name'])." ".ucwords($employee['last_name'])."</a></td>";
                                                   // echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                                                    echo "<td>".$employee['primary_mail']."</td>";
                                                    echo "<td>".$employee['company_mail']."</td>";
                                                 

                                                   
                                                    echo "<td>Active</td>";
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
                                   <div class="product-tab-list tab-pane " id="pending">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          
         
                                    <table id="invite_pending"  class="table  table-bordered" style="width:100%" >
                                        <thead>
                                            <tr>
                                                <th ></th>
                                                
                                             
                                                
                                                <th data-field="email" >Email</th>
                                                   
                                               
                                               
                                                <th data-field="Status" >Status</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           
                                           
                                                foreach($invite_emp_pending as $emp)
                                               {
                                                    echo "<tr>";
                                                    $id=encrypt_url($emp['id']);
                                                   
                                                   echo "<td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td>";
                                                    
                                                   // echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                                                    echo "<td>".$emp['company_mail']."</td>";
                                                   

                                                   
                                                    echo "<td>Waiting Response</td>";
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


        <!-- The Modal -->
<div class="modal" id="invite_emp_content">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Invite to Referrals</h4>
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
                <p class="modal-body-del">Are you sure want to delete Referrals ?</p>
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

    
