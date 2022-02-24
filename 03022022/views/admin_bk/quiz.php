
<div class="right_col" role="main" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quiz </h3>
              </div>
              <div class="text-right"> 
           <a href="<?php echo base_url('admin/add_quiz');?>" type="button" class="btn btn-warning btn1">Add Quiz</a>
          
        </div>

           
            </div>
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
                   <div class="clearfix"></div>
                   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="">
                  
               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="alert alert-success" role="alert" id="success_message" style="display: none;">Quiz Delete Completed</div>
         <input type="hidden" name="tname" id="tname" value="quiz">
                    <table id="clientTable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr>
                                                <th></th>
                                                 <th data-field="name">Video Title</th>
                                                 <th data-field="course_description">Description</th>
                                                 
                                                 
                                                 
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
                                                    echo "<td><a href='#'>".ucwords($test['course_title'])."</a></td>";
                                                   // echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                                                    echo "<td>".$test['course_description']."</td>";

                                                   
                                                 

                                                   
                                                    
                                                      echo "<td><a href='".base_url('admin/test/details/'.$test_id)."'>View</a>
                                                      

                                                      </td>";

                                                    echo "</tr>";
                                               }
                                               
                                            ?>
                                           
                                        </tbody>
                                    </table>                       </div>
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
</div>
