  <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="profile-info-inner">
                         
                            <div class="profile-details-hr ">
                            <div class="row">
							    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                                        <div class="info-box-content">
                                           <span class="info-box-text">Referrals</span>
                                           <span class="info-box-number"><?php echo $all_details['total_emp'];?></span>                               
                                        </div>
                                    </div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-video-camera"></i></span>
                                        <div class="info-box-content">
                                           <span class="info-box-text">Total Time</span>
                                           <span class="info-box-number"><?php echo $all_details['view_time'];?></span>                               
                                        </div>
                                    </div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="fa fa-file-video-o"></i></span>
                                        <div class="info-box-content">
                                           <span class="info-box-text">Viewed Videos</span>
                                           <span class="info-box-number"><?php echo $all_details['no_of_courses'];?></span>                               
                                        </div>
                                    </div>
                                </div>

                                </div>
                               
                             
                            </div>
                        </div>
                    </div>
                
                                <div class="" id="users">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                  
		 <br/>
		 
		 <?php
        //   print "All details";
        // print "<br/>";
        //   print_r($all_details);
        //   print "<br/>";
        //    print_r($emp_datas);

		 	foreach($emp_datas as $emp_ratio)
		    {

               
		    //	echo ucwords($emp_ratio['first_name'])." " .ucwords($emp_ratio['last_name']);
		    	
		    	$time=$emp_ratio['view_ratio1'];
                if($time!='')
                {
                        $chunks=explode(':',$time);
                $view_time=$chunks[0]." Hours " .$chunks[1]." Min".$chunks[2]."Sec";
                }
                else
                {
                    $view_time=00;
				
            }
				$percentage=100;

				// if($time_fmt[0]!=00 && $time_fmt[1]!=00 && $time_fmt[2]!=00)
				// 	{

				// 		$percentage=100;
				// 	}
				// 	else
				// 	{
				// 		$percentage=0;
				// 	}
					
				// 	if($time_fmt[0]!=00 && $time_fmt[1]!=00)
				// 	{

				// 		$view_timefmt=$time_fmt[0]." Hours " .$time_fmt[1]." Min";

				// 	}
				// 	else
				// 	{
				// 		$view_timefmt=$time_fmt[1]." Min";

				// 	}
		    ?>	
		    <br/>
            <!--
		    <div class="progress">
		    	<div class="progress-bar" role="progress-bar" style="width:<?php //echo  $percentage;?>%"> <?php echo $view_time;?> </div>

		    </div>-->
		   
		    <br/>


		   <?php


		    }
		 ?>
		 <?php
		 //  print_r($emp_datas);
		   $this->load->helper('date');
   
		
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Viewed Videos</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$this->load->helper('secure');
			 
				foreach($emp_datas as $emp_data)
				{
					 
					$join_date= date("F d ,Y", strtotime($emp_data['join_date']));
					$time=$emp_data['view_ratio1'];
					$emp_id=encrypt_url($emp_data['emp_id']);
					
					 if($time!='')
                {
                        $chunks=explode(':',$time);
               // $view_time=$chunks[0]." Hours " .$chunks[1]." Min".$chunks[2]."Sec";
               $view_time=$time;
                }
                else
                {
                    $view_time=00;
                
            }
					// print_r($chunks);
					// if($chunks[0]!=00 && $chunks[1]!=00)
					// {

					// 	$view_time=$chunks[0]." Hours " .$chunks[1]." Min";

					// }
					// else
					// {
					// 	$view_time=$chunks[1]." Min";

					// }

					if($emp_data['action_time']=='')
					{
						$active_time= "null";
					}
					else
					{
						$now=time();
					$user_time = strtotime($emp_data['action_time']);
					$active_time=timespan($user_time, $now) . ' ago';
					}
				  echo "<tr>";
				  
				  echo "<td><a href='".base_url('employee/details/'.$emp_id)."'>".ucwords($emp_data['first_name'])." ".ucwords($emp_data['last_name'])."</a></td>";
				  echo "<td>".$emp_data['company_mail']."</td>";
				
				    //echo "<td>".$join_date."</td>";
				   // echo "<td>".$view_time."</td>";
				    echo "<td>".$emp_data['no_course']."</td>";
				   // echo "<td>".$active_time."</td>";
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
                                
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>