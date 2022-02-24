<p>analytics</p>
<p>Alluser</p>

<div class="row mb-5">
	<div class="col-sm-4">
		All user details

		overview 
		<ul>
			
			  	<li>Users =><?php echo $all_details['total_emp'];?></li>
			<li>Total View Time => <?php echo $all_details['view_time'];?></li>
			<li>Avg view Time => <?php echo $all_details['avg_time'];?></li>
			<li>courses views=><?php echo $all_details['no_of_courses'];?></li>
			  
		</ul>
	</div>
	<div class="col-sm-8">
		<h1>USERS</h1>
		 Prograssbar
		 <br/>
		 
		 <?php
        //   print "All details";
        // print "<br/>";
        //   print_r($all_details);
        //   print "<br/>";
        //    print_r($emp_datas);

		 	foreach($emp_datas as $emp_ratio)
		    {

               
		    	echo $emp_ratio['first_name']." " .$emp_ratio['last_name'];
		    	
		    	$time=$emp_ratio['view_ratio1'];
				$chunks=explode(':',$time);
				$view_time=$chunks[0]." Hours " .$chunks[1]." Min".$chunks[2]."Sec";
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
		    <div class="progress">
		    	<div class="progress-bar" role="progress-bar" style="width:<?php echo  $percentage;?>%"> <?php echo $view_time;?> </div>

		    </div>
		   
		    <br/>


		   <?php


		    }
		 ?>
	</div>

</div>

<div class="row">

	<div class="col-sm-12">
		<?php
		 //  print_r($emp_datas);
		   $this->load->helper('date');
   
		
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
					<td>Team</td>
					<td>Join Data</td>
					<td>view Time</td>
					<td>Courses</td>
					<td>Last activity</td>

				</tr>
			</thead>
			<tbody>
				<?php
				foreach($emp_datas as $emp_data)
				{
					$join_date= date("F d ,Y", strtotime($emp_data['action_time']));
					$time=$emp_data['view_ratio1'];
					$chunks=explode(':',$time);
					$view_time=$chunks[0]." Hours " .$chunks[1]." Min".$chunks[2]."Sec";
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
				  
				  echo "<td>".$emp_data['first_name']." " .$emp_data['last_name']."</td>";
				  echo "<td>".$emp_data['company_mail']."</td>";
				   echo "<td>".$emp_data['team']."</td>";
				    echo "<td>".$join_date."</td>";
				    echo "<td>".$view_time."</td>";
				    echo "<td>".$emp_data['no_course']."</td>";
				    echo "<td>".$active_time."</td>";
				  echo "</tr>";
				 }

				?>
			</tbody>
		</table>

		<br/><br/>
			<h1>Courses</h1>
		<?php

			//print_r($course_details);
			foreach($course_details as $course_data)
		    {

               
		    	echo $course_data['course_title'];
		    	
		    	
					$duration1=$course_data['view_time'];
					
		    ?>	
		    <br/>
		    <div class="progress">
		    	<div class="progress-bar" role="progress-bar" style="width:<?php echo  $percentage;?>%"> <?php echo $duration1;?> </div>

		    </div>
		   
		    <br/>


		   <?php


		    }
		 
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Course Title</td>
					
					<td>Duration</td>
					<td>Members</td>
					<td>View Time</td>
					<td>AVG Completion</td>

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
						echo "<td>".$duration."</td>";
						echo "<td>".$course['members']."</td>";
						echo "<td>".$course['view_time']."</td>";
						echo "<td>".$course['avg_time']."</td>";
						echo "</tr>";
					}
				?>
				<tr>
                        
				</tr>
			</tbody>
		</table>

		<h1>TEST</h1>

		<table>
			
		</table>
		
	</div>
</div>