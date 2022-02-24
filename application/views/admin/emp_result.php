 
                
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->



<!-- Page Heading -->
<div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Test Result</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/employee/');?>"  name="back_btn" id="back_btn"  class="custom-btn-main d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>

</div>
</div>
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
		                      <div class="col-sm-12 ">
		                      	<input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
								   
								     
								    <div class="answers">
		                       
                




			<?php

			//echo $index ." ". $question['question']."";

			//echo "<br/>";
			echo '<div class="card">
			<div class="card-header">
				<h4 class="card-title">'. $index.".".$question['question']."" ?></h4>
				<?php
					if($question['is_correct'])
					{
						echo '<label class="btn btn-sm crt_ans_btn pull-right">Correct</label>';
					}
					else
					{
						echo  '<label class="btn btn-sm  wrg_ans_btn pull-right">Wrong</label>';
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