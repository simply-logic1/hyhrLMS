  <!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
   <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="back-btn" style="margin-bottom:10px"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
               <div class="">
                   <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1><?php echo $ques[0]['course_title'];?></h1>
                        </div>
                   </div>
                   <hr/>
               </div>
            </div>

        </div>

        <div class="row res_content">
        	<div class="col-sm-4 col-md- 4 col-xs-12">
        		<h3>Your Score</h3>
        		<?php 
        		 $tot_ques=$ques[0]['total_question'];
        	

 $score=($ques[0]['exam_score']/$tot_ques)*100;



        		?>
        		<label class="btn btn-success btn-lg btn-block"> <?php echo floor($score).' %';?></label>
        		<br/>
        		<!-- <div class="progress">
  <div class="progress-bar" role="progressbar"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php //echo $score.'%';?>">
    <?php //echo floor($score).' %';?>
  </div>
</div> -->

        	<p><b> Date of Exam  : </b> <?php echo $ques[0]['date_of_exam'];?>
        		

        	</div>
        	<div class="col-sm-4 col-md- 4 col-xs-12">
        		<h3>Good Work on These Concepts</h3>
        		<p>Your answered  quesions that covered  these concepts correctly</p>

        	</div>
        	<div class="col-sm-4 col-md- 4 col-xs-12">

        		<h3 class="head_red">There is still more to learn </h3>
        		<p>Review this concepts before to your last quiz attempt or  to prepare for your next performance assestment </p>

        	</div>
        </div>

      <div class="row ">
		                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

        	<!-- question -->
        	<?php
        	$index=1;
        	foreach($ques as $question)


		{
			$anss=explode(",",$question['allanswer']);

			$answers=$question['allanswer'];
			?>
     

        					  
		                  <div class="row question_box">
		                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                      	<input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
								        <label class="login2 ques_label text-left"><?php echo $index."."; echo "".$question['question'].""; ?>
								    </label>
								  
								    	<?php
								    	if($question['user_ans'])
										{
											echo '<label class="btn btn-sm crt_ans_btn pull-right">You were correct</label>';
										}
										else
										{
											echo  '<label class="btn btn-sm  wrg_ans_btn pull-right">You were wrong</label>';
										}
															    	?>
								    </label>
								    <div class="answers">
		                       
                




			<?php

			//echo $index ." ". $question['question']."";

			//echo "<br/>";
			
			foreach($anss as $ans)
			{
				$anss_arr=explode(":",$ans);
				
				

		if($anss_arr[0]==$question['answer'] && $anss_arr[0]==$question['correct_ans']){
			$answer_status=true;
			
	echo '<label class="ans_btn btn-block answer crt_ans " id="answer_q'.$index.'" name="answer_q'.$index.'" ><span class="btn-label"><i class="fa fa-check ans_fa "></i></span> '.$anss_arr[1].'</label>';

			}
			else if($anss_arr[0]==$question['answer'] && $anss_arr[0]!=$question['correct_ans']){
				$answer_status=false;
					echo '<label  class="wrg_ans ans_btn btn-block answer " id="answer_q'.$index.'" name="answer_q'.$index.'" ><span class="btn-label"><i class="fa fa-close ans_fa "></i></span> '.$anss_arr[1].'</label>';
			


			}
			else if($anss_arr[0]!=$question['answer'] && $anss_arr[0]==$question['correct_ans']){
				echo '<label class="crt_ans ans_btn btn-block answer " id="answer_q'.$index.'" name="answer_q'.$index.'" ><span class="btn-label"><i class="fa fa-check ans_fa "></i></span> '.$anss_arr[1].'</label>';
			
			


			}


			
else
{
	echo '<label class="ans_btn btn-block answer " id="answer_q'.$index.'" name="answer_q'.$index.'" ><span class="btn-label"><i class=" ans_fa fa fa-chevron-right"></i></span> '.$anss_arr[1].'</label>';
	
}
		
				
				// echo "<input type='radio' id='answer_q".$index."' name='answer_q".$index."' value='".$anss_arr[0]."'>";
				// echo  $anss_arr[1];

				//echo " " .$anss_arr[2];

				
			}
			
			//echo $question['allanswer']." " .$question['is_correct'];
		
			echo '</div>';
			



			echo '</div></div>';
			$index++;
		

		}

?>
<!-- <input type="submit" name="add_user_test" id="add_user_test" value="Submit"> -->
</div>


 

		                 

 
        

        	<div class="col-md-4 col-sm-4 col-xs-12">
        		<div class="video_head">
        			<h3>Concept</h3>
        			<p><?php echo $ques[0]['course_description'];?></p>
        		</div>

        	</div>

        </div>

        
    </div> <!-- container-fluid -->

</div><!-- basic form -->


