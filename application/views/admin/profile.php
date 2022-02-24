  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            <div class="back-btn"><a class="btn btn-primary" href="<?php echo base_url('admin/client');?>">&lt; Back</a></div>
              <div class="title_left">
                <h3> Ambassador's Referral Profile</h3>
                <?php
                
                ?>
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
                      <h3><?php echo ucwords($client_data['first_name'])." ".ucwords($client_data['last_name']);?></h3>

                      <ul class="list-unstyled user_data">
                       <!--  <li><i class="fa fa-briefcase user-profile-icon"></i>
                          <?php //echo $client_data['company_name'];?>
                        </li> -->

                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i> <?php echo $client_data['email_id'];?>
                        </li>
                         <li>
                          <i class="fa fa-phone"></i> <?php echo $client_data['mobile_no'];?>
                        </li>

                    
                      </ul>

                     
                      <br />

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

               
                      <!-- start of user-activity-graph -->
                    <!--   <div id="graph_bar" style="width:100%; height:280px;"></div> -->
                      <!-- end of user-activity-graph -->

         
                    </div>
                        <div class="col-sm-12 col-8">
                    <div class="">
                               <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Referrals</a>
                          </li>
                           <li role="presentation" class=""><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Leader Board</a>
                          </li>
                         
                        
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                      
                                      <!--employee start -->
                            <table class="table  table-bordered"  id="sampleTable">
                              <thead>
                                <tr>
                                  <th>Name</th>
                              
                                   
                                      <th>Email</th>
                                  <th>Mobile</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                           
                                      <?php 
                                      
                                      if(empty($employees))
                                      {
                                        echo "<tr ><td colspan='5' class='text-center'>No Data Available</td></tr>";

                                      }
                                      foreach($employees as $employee)
                                      { 
                                        if($employee['status']==1)
                                        {
                                        $this->load->helper('secure');
                                        $id=encrypt_url($employee['id']);
                                        ?>
                                        <tr>
                                  <td>
                                    <?php echo ucwords($employee['first_name'])." ".ucwords($employee['last_name']);?>
                                  </td>
                                   
                                  <td>
                                     <?php  echo $employee['company_mail'];?>
                                  </td>
                                  <td><?php echo  $employee['phone_no'];?></td>
                                  <td><a type="button" href="<?php echo base_url('admin/employee/'.$id);?>" class="btn btn-primary btn-xs">
                                View Profile
                              </a></td>
                                 
                                </tr>
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                      
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            
                            <div class="left col-xs-12">
                              <h2><?php //echo ucwords($employee['first_name'])." ".ucwords($employee['last_name']);?></h2>
                              <p><strong>About : <?php// echo $employee['designation'];?> </strong>  </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-envelope"></i> <?php // echo $employee['company_mail'];?>  </li>
                                <li><i class="fa fa-phone"></i>  <?php //echo  $employee['phone_no'];?> </li>
                                <li><i class="fa fa-envelope"></i> <?php //echo $client_data['company_address'];?></li>
                              </ul>
                            </div>
                           
                          </div>
                          <div class="col-xs-12 bottom text-center">
                           
                            <div class="col-xs-12 col-sm-6 emphasis">
                              
                              <a type="button" href="<?php //echo base_url('admin/employee/'.$id);?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </a>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <?php
                                        }
                    }
                    ?>
                  </tbody>
                </table>

                                     
                           
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                

                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th> Name</th>
                                        <th>Total Quiz Score</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>



                                <?php
                                
                                 $tot_ques=$quiz_details[0]['all_question'];
                               
                                 if(array_column($quiz_details, 'Rank'))
                                 {

                                foreach($quiz_details  as $det)
                                {
                                  if($det['status']==1)
                                  {
                                    echo "<tr>"; 
                                    if($det['Rank']==0)
                                     {
                                       $rank='-';
                                     }
                                     else
                                     {
                                      $rank=$det['Rank'];
                                     }
                                      echo "<td>".$rank."</td>";
                                    echo "<td>".$det['first_name']." ".$det['last_name']."</td>";
                                    $score=($det['score']/$tot_ques)*100;

                               
                                  echo "<td>".$det['score']."</td>";
                                   
                                  echo '<td><div class="progress">
  <div class="progress-bar" role="progressbar"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$score.'%">
    '.floor($score).' %
  </div>
</div></td>';
                                      
                                  echo "</tr>";
                                }
                              }
                              }
                              else
                              {
                               
                                echo "<tr>";
                                      echo "<td> No data available.</td>";
                                      echo"</tr>";
                              }

                                ?>          
        
                                
                              

                                     
                          
                            <!-- end user projects -->

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

  
                     
                        
                            
                          
                                   
                                     
                              
                            
    

