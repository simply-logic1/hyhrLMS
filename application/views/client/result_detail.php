  <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="profile-info-inner">
                        
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <?php 
                                            $emp_id=$emp_data[0]['emp_id'];
                                        ?>
                                        <div class="address-hr">
                                            <p><b>Name</b>  <?php echo $emp_data[0]['first_name']." " .$emp_data[0]['last_name'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Designation</b>  <?php echo $emp_data[0]['designation'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email ID</b> <?php echo $emp_data[0]['primary_mail'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Phone</b> <?php echo $emp_data[0]['phone_no'];?></p>
                                        </div>
                                    </div>
                                </div>
                            
                             
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                          
                           
                               
                                   <div class=" " id="analytics">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">                                                                                          <table class="table table-striped">
            <thead>
                <tr>
                    <th>Video Title</th>
                    <th>Date</th>
                    <th>Total Questions</td>
                    <th>Attempted Questions</th>
                   
                    
                    <th>Score</th>

                </tr>
            </thead>
            <tbody>
                <?php
                 $this->load->helper('secure');
                 $emp_sid=encrypt_url($emp_id);
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

                         
                          //  echo "<td><a 
                          //  href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          // >View</a></td>";

                        echo "</tr>";
                    }
                ?>
                <tr>
                        
                </tr>
            </tbody>
        </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                        
                            
                      
                    </div>
                </div>
            </div>
        </div>