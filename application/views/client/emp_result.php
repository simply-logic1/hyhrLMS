   <!-- BEGIN: Content-->
   <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Quiz Result</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
								<?php
								 $user_id=$this->session->userdata('user_unique_id');

                                    
								?>
                                    <li class="breadcrumb-item"><a href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
									 <li class="breadcrumb-item"><a href="  <?php echo base_url('library/quiz_result/'.$user_id);?>">Quiz</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Quiz Result   
                                    </li>
                                     
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
             
            <div class="content-body">
                <!-- Input Mask start -->
                <section id="input-mask-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
								<h4 class="card-title"><?php echo $ques[0]['course_title'];?></h4>
									<?php
                                            	$this->load->helper('secure');
                                            	$user_id=encrypt_url($this->session->userdata('user_id'));
                                            	?>
                                     
                                </div>
                                <div class="card-body row">
                                     
                                        
                                              <h3 class="card-title"></h3>
											  <?php 
	$id =encrypt_url($video_details['id']);
	
	



	?>
	<div class="col-sm-4">
	<h3>Your Score</h3>
        		<?php 
        		 $tot_ques=$ques[0]['total_question'];
 
$count=0;
foreach($ques as $que)
{
	if($que['is_correct']==1)
	{
		 
        $count=++$count;
	}
}
 
 $score=($count/$tot_ques)*100;

 
 
        		?>
        	 <?php echo floor($score).' %';?>
				<div class="progress-wrapper">
                                             
                                            <div class="progress progress-bar-primary">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo floor($score).' %';?>" aria-valuemin="<?php echo floor($score).' %';?>" aria-valuemax="100" style="width:<?php echo floor($score).'%';?>" aria-describedby="example-caption-2"><?php echo floor($score).' %';?></div>
                                            </div>
                                        </div>
        		<br/>
					<p class="card-title mt-3"><b> Date of Exam  : </b> <?php 
					
					 
					$timestamp1= strtotime($ques[0]['date_of_exam']); 
					$new_date1 = date('M d,Y H:i:s', $timestamp1);
			   
			 
					
					echo $new_date1;?>
					</div>
					<div class="col-sm-4 col-md- 4 col-xs-12">
        		<h3>Good Work on These Concepts</h3>
        		<p>Your answered  quesions that covered  these concepts correctly</p>

        	</div>
        	<div class="col-sm-4 col-md- 4 col-xs-12">

        		<h3 class="head_red">There is still more to learn </h3>
        		<p>Review this concepts before to your last quiz attempt or  to prepare for your next performance assestment </p>

        	</div>
			<?php
			$index=1;
		 
        	foreach($ques as $question)


		{
			$anss=explode(",",$question['allanswer']);

			$answers=$question['allanswer'];
			?>
     

        					  
		                  <div class="row question_box">
		                      <div class=" ">
		                      	<input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
								   
								     
								    <div class="answers">
		                       
                




			<?php

			//echo $index ." ". $question['question']."";

			//echo "<br/>";
			echo '<div class="card">
			<div class="card-header">
				<h4 class="card-title">'. $index.".".$question['question'].""; ?></h4>';
				<?php
					if($question['is_correct'])
					{
						echo '<label class="btn btn-sm crt_ans_btn pull-right">You were correct</label>';
					}
					else
					{
						echo  '<label class="btn btn-sm  wrg_ans_btn pull-right">You were wrong</label>';
					}
												?>
			</div>
			<div class="card-body">
				<div class="answers ">
				<?php
					 
foreach($anss as $ans)
{
$anss_arr=explode(":",$ans);



if($anss_arr[0]==$question['answer'] && $anss_arr[0]==$question['correct_ans']){
$answer_status=true;
echo '<div class="form-check  question-check ">
 
<input checked class="form-check-input answer ur-correct-answer" type="radio" name="inlineRadioOptions" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer"  disabled  >
<label class="form-check-label" for="inlineRadio2">'.$anss_arr[1].'</label>
</div>';

}
else if($anss_arr[0]==$question['answer'] && $anss_arr[0]!=$question['correct_ans']){
$answer_status=false;
echo '<div class="form-check  question-check"> 

<input checked class="form-check-input answer wrong-answer" type="radio" name="inlineRadioOptions" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer"  disabled >
<label class="form-check-label" for="inlineRadio2">'. $anss_arr[1].'</label>
</div>';
 



}
else if($anss_arr[0]!=$question['answer'] && $anss_arr[0]==$question['correct_ans']){
echo '<div class="form-check  question-check">

<input   class="form-check-input answer crct-ans"  disabled type="radio" name="inlineRadioOptions" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer"    >
<label class="form-check-label" for="inlineRadio2">'. $anss_arr[1].'</label>
</div>';




}



else
{
echo '<div class="form-check  question-check">

<input   class="form-check-input answer" type="radio"  disabled name="inlineRadioOptions" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer"   >
<label class="form-check-label" for="inlineRadio2">'. $anss_arr[1].'</label>
</div>';

}





}
			
			//echo $question['allanswer']." " .$question['is_correct'];
		
			echo '	</div>
			</div>
		</div></div>';
			



			echo '</div></div>';
			$index++;
		

		}

?>

                                  
										 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Mask End -->

            </div>
        </div>
    </div>
    <!-- END: Content-->