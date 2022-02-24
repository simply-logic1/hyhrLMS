  <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        
                            
                            <div class="profile-details-hr ">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p> <?php echo $all_details['total_emp'];?><br /><b>Users</b> </p>
                                        </div>
                                 </div>
                                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-6">
                                          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p> <?php echo $all_details['view_time'];?><br /><b>Total View Time</b> </p>
                                        </div>

                                    </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-6">
                                          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><?php echo $all_details['no_of_courses'];?> <br /><b>Video views</b><br />  </p>
                                        </div>

                                    </div>
                                </div>
					
                                     
                                
                               
                             
                            </div>
                        </div>
                    </div>
                   
                                   <div class=" " id="courses">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                 
                                                  <?php
                                                  $percentage=100;
												  foreach($course_details as $course_data)
		    {

               
		    //	echo $course_data['course_title'];
		    	
		    	
					$duration1=$course_data['view_time'];
					
		    ?>	
		    <br/>
            <!--
		    <div class="progress">
		    	<div class="progress-bar" role="progress-bar" style="width:<?php //echo  $percentage;?>%"> <?php echo $duration1;?> </div>

		    </div>
            -->
		   
		    <br/>


		   <?php


		    }
		 
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Video Title</th>
					
					<th>Duration</th>
					<th>Members</th>
					<th>View Time</th>
					

				</tr>
			</thead>
			<tbody>
				<?php

					foreach($course_details as $course)
					{
						$course_duration=$course['duration'];
					$fmt_time=explode(':',$course_duration);
					$duration=$fmt_time[0]." Hours " .$fmt_time[1]." Min".$fmt_time[2]."Sec";
					
				
						echo "<tr>";
						echo "<td>".$course['course_title']."</td>";
						echo "<td>".$course['duration']."</td>";
						echo "<td>".$course['members']."</td>";
						echo "<td>".$course['view_time']."</td>";
						
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
                      