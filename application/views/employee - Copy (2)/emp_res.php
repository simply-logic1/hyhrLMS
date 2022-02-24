<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Quiz Results </h3>
              
            </div>
            <div class="row">
               
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     
                    <table class="table table-striped">
                      <thead>
                       <tr>
                    <th>Video Title</th>
                    <th>Date</th>
                    <th>Total Questions</td>
                    <th>Attempted Question</th>
                    <th>Score</th>
                   
                    
                    <th>Action</th>

                </tr>
                      </thead>
                      <tbody>
                           <?php
                if(empty($test_report))
                {
                    echo "<tr><td colspan='6' class='text-center'>No Data Found</tr>";
                }
                 $this->load->helper('secure');
                $uid=$this->session->userdata('user_id');
                          $emp_sid=encrypt_url($uid);   
                    foreach($test_report as $test)
                    {
                        
                        if($test['status']==1)
                        {
                            $status='Complete';
                        }
                       


                        $id=encrypt_url($test['res_id']);
                        echo "<br/>";
                    




                
                        echo "<tr>";
                        echo "<td>".$test['course_title']."</td>";
                        echo "<td>".$test['date_of_exam']."</td>";
                        echo "<td>".$test['total_question']."</td>";
                        echo "<td>".$test['total_question']."</td>";
                          echo "<td>".$test['exam_score']."</td>";
                         
                           echo "<td><a 
                           href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          >View</a></td>";

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
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>