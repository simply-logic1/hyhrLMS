
  <!-- Basic Form Start -->

        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
           
         
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Questions</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                            	<?php
                                            	$this->load->helper('secure');
                                            	$user_id=encrypt_url($this->session->userdata('user_id'));
                                            	?>

<form name="user_take_test" id="user_take_test" method="post" action="<?php echo base_url('library/result/'.$user_id);?>" >
<?php 

 if(!empty($ques))
 {

		$index=1;
		echo "<br/>";
		$no_of_ques=count($ques);
		
		$next_que=$question_id;
		++$next_que;
		 echo '<input type="hidden" name="view_question" id="view_question" value="'.$question_id.'">';
	 echo '<input type="hidden" name="no_of_ques" id="no_of_ques" value="'.$no_of_ques.'">';
	 $tid=$ques[0]['tid'];
	 echo '<input type="hidden" name="test_id" id="test_id" value="'.$tid.'">';


		foreach($ques as $question)
		{

			$anss=explode(",",$question['allanswer']);
			$answers=$question['allanswer'];
			?>
			  <fieldset id="setup-content" class="question<?php echo $question['question_id'];?>">
			    <div class="form-group-inner">
		                  <div class="row">
		                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                      	<input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
								        <label class="login2 "><?php echo $index."."; echo "</label><b>".$question['question']."</b>"; ?>
		                        </div>

		                   </div>
                




			<?php

			//echo $index ." ". $question['question']."";

			//echo "<br/>";
			
			foreach($anss as $ans)
			{
				$anss_arr=explode(":",$ans);
				
				echo '<div class="row"> 
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div class="i-checks pull-left"> <p> <input type="radio" style="margin-right:0.5rem" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer" value="'.$anss_arr[0].'">'. $anss_arr[1].' </p>
</div> </div> </div>';
				
				// echo "<input type='radio' id='answer_q".$index."' name='answer_q".$index."' value='".$anss_arr[0]."'>";
				// echo  $anss_arr[1];

				//echo " " .$anss_arr[2];

				
			}
			//echo $question['allanswer']." " .$question['is_correct'];
			echo '</div><br/>';
			if($no_of_ques==$index)
			{
				echo '<br/><input type="submit" name="next" class="next btn btn-primary pull-right action-button" value="Submit"/>';
			}
			else
			{
			echo '<input type="button" name="next" class="next btn btn-primary pull-right action-button" value="Next"/>';
		}

			if($index==1 || $next_que==$question['question_id'])
			{
				
			}
			else
			{
				echo   '<input type="button" name="previous" class="btn btn-info previous action-button-previous" value="Previous"/>';

			}
			



			echo '</fieldset>';
			$index++;

		}
 }
 else
 {
     echo '   <div class="form-group-inner">
    	                  <div class="row">
		                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                         <label>No question there. Please Check out later</label>
		                        </div>

		                   </div></div>';
 }
?>
<!-- <input type="submit" name="add_user_test" id="add_user_test" value="Submit"> -->
</form>

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
        <!-- Basic Form End-->