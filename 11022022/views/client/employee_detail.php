  <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                    <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
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
                                        <p><b>Email ID</b>  <?php echo $emp_data[0]['primary_mail'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Phone</b>  <?php echo $emp_data[0]['phone_no'];?></p>
                                        </div>
                                    </div>
                                </div>
                          
                             
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#videos">Videos</a></li>
                                 <li><a href="#analytics">Analytics</a></li>
                                 <li><a href="#profile"> Profile</a></li>
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="videos">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                    <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                  <th>Duration</th>
                    <th>View Time</th>
                    <th>Status</th>
                    <th>Test Status</th>

                </tr>
            </thead>
            <tbody>
                <?php

                    
                    foreach($assign_videos as $course)
                    {
                        $course_duration=$course['duration'];
                    $fmt_time=explode(':',$course_duration);
                    $duration=$fmt_time[0]." Hours " .$fmt_time[1]." Min".$fmt_time[2]."Sec";
                    if($course['view_ratio']=='')
                    {
                        $ratio="00:00:00";
                    }
                    else
                    {
                      $ratio=$course['view_ratio'];
                    }
                       if($course['status']=='')
                    {
                        $status="Incomplete";
                    }
                    else
                    {
                       $status=$course['status'];
                    }
                    
                
                        echo "<tr>";
                        echo "<td>".$course['course_title']."</td>";
                        echo "<td>".$course['duration']."</td>";
                        echo "<td>".$ratio."</td>";
                        echo "<td>".ucwords($status)."</td>";
                          echo "<td>".$course['test_result']."</td>";

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
                                   <div class="product-tab-list tab-pane fade " id="analytics">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                 

                                                                                           <table class="table table-striped">
            <thead>
                <tr>
                    <th>Video Title</th>
                    <th>Date</th>
                    <th>Total Questions</td>
                    <th>Attempted Question</th>
                   
                    
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                 $this->load->helper('secure');
                 $emp_sid=encrypt_url($emp_id);
                 if(empty($test_report))
                 {
                    echo "<tr><td colspan='5' class='text-center'>No Data Available</td></tr>";
                 }
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
                         
                           echo "<td><a 
                           href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          >View</a></td>";

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
                                <div class="product-tab-list tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Full Name</b><br /> <?php echo $emp_data[0]['first_name']." " .$emp_data[0]['last_name'];?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Mobile</b><br /> <?php echo $emp_data[0]['phone_no'];?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Email</b><br /> <?php echo $emp_data[0]['primary_mail'];?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Location</b><br /> <?php echo $emp_data[0]['address'];?></p>
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
                </div>
            </div>
        </div>