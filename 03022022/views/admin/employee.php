  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">
                <h3>Ambassador Profile</h3>
             
              </div>

          
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                        </div>
                      </div>
                      <h3><?php echo ucwords($emp_data['first_name'])." ".ucwords($emp_data['last_name']);?></h3>

                      <ul class="list-unstyled user_data">
                         

                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i> <?php echo $emp_data['primary_mail'];?>
                        </li>

                    
                      </ul>

                     
                      <br />

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                       
                      <!--   <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div> -->
                      </div>
                      <!-- start of user-activity-graph -->
                    <!--   <div id="graph_bar" style="width:100%; height:280px;"></div> -->
                      <!-- end of user-activity-graph -->

         
                    </div>
                        <div class="col-sm-12 col-8">
                    <div class="">
                               <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          
                          
                        
                          <li role="presentation" class=""><a href="#video" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Videos</a>
                          </li>
                           <li role="presentation" class=""><a href="#test" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Quiz</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                        
                            
                          <div role="tabpanel" class="tab-pane fade" id="company" >
                            <p><?php echo $emp_data['company_mail'];?></p>
                                

                          
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade " id="test" >
                         <table class="table table-striped">

                          <thead>
                <tr>
                    <th>Video Title</th>
                    <th>Date</th>
                    <th>Total Questions</td>
                    <th>Attempted Question</th>
                   
                    
                    <th>Score</th>

                </tr>
            </thead>
            <tbody>
                <?php
              
                 $this->load->helper('secure');

                    if(empty($test_report))
                    {
                      echo "<tr><td colspan='4' class='text-center'>No Data Available</td></tr>";
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
                          <div role="tabpanel" class="tab-pane fade active in" id="video" >
                            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Video Title</th>
                    <th>Duration</td>
                    <th>View Time</th>
                    <th>Status</th>
                    <th>Quiz Status</th>

                </tr>
            </thead>
            <tbody>
                <?php

                  $video_count=count($videos);

               
               
                  if(empty($videos))
                  {

                        echo "<tr><td colspan='5' class='text-center'>No Data Available</td></tr>";
                      
                  }
                
                
                  
                    foreach($videos as $course)
                    {
                      
                        $course_duration=$course['duration'];
                      
                    // $fmt_time=explode(':',$course_duration);
                    // $duration=$fmt_time[0]." Hours " .$fmt_time[1]." Min".$fmt_time[2]."Sec";
                      if($course['status']=='')
                      {
                        $status="Incomplete";

                      }
                      else
                      {
                        $status="Completed";
                      }
                       if($course['view_ratio']=='')
                      {
                        $view_ratio="00:00:00";

                      }
                      else
                      {
                        $view_ratio=$course['view_ratio'];
                      }
                
                        echo "<tr>";
                        echo "<td>".$course['course_title']."</td>";
                        echo "<td>".$course['duration']."</td>";
                        echo "<td>".$view_ratio."</td>";
                        echo "<td>".$status."</td>";
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
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- /page content -->