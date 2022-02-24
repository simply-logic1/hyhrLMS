
   
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
        <h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Survey</h1>
        <div class="col-lg-6 text-right align-items-center justify-content-end mb-4">
        
      
        <a href="<?php echo base_url('admin/add_survey');?>"  name="add_survey" id="add_survey"  class="custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Survey</a>
        
</div>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body card-table">
              <?php
            $msg=$this->session->flashdata('quiz-msg');
                     if(isset($msg))
                     {
                      $message = $this->session->flashdata('quiz-msg');
                      ?>
                      <div ><?php echo $message; ?></div>

                      <?php
                     }
                     
                     ?>

            <div class="alert alert-success" role="alert" id="success_message" style="display:none">Survey Deleted Successfully</div>
                <div class="table-responsive">
                    <table class="table table align-items-center table-flush" id="clientTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr role="row">
                        <th></th>
                                                 <th data-field="name"> Title</th>
                                                 
                                                 
                                                 
                                                <th>Action</th>
                                                
                        </tr>
                        <input type="hidden" name="tname" id="tname" value="course_survey">
                        </thead>
                     
                        <tbody>
                             
                            
                        <?php
                                            $this->load->helper('secure');
                                            
                                            
                                                foreach($test_list as $test)
                                               {
                                                       $test_id=encrypt_url($test['id']);
                                                     
                                                    echo "<tr>";
                                                   
                                                   echo "<td><input type='hidden' name='test_id' id='test_id' value='".$test_id."'></td>";
                                                    echo "<td> ".ucwords($test['survey_name'])."</td>";
                                                   // echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                                                   
                                                   
                                                 

                                                   
                                                    
                                                      echo "<td><a href='".base_url('admin/survey/details/'.$test_id)."'>View</a>
                                                      

                                                       </td>";

                                                    echo "</tr>";
                                               }
                                               
                                            ?>
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="del_cenmodel" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Confirmation
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
            </div>
            <div class="modal-body modal-body-del">
                <p class="modal-body-del">Are you sure you want to delete ?</p>
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
 