   <!-- BEGIN: Content-->
   <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Quiz</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Quiz   
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
									<?php
                                            	$this->load->helper('secure');
												$user_id=encrypt_url($this->session->userdata('user_id'));
											 
                                            	?>
                                    <h4 class="card-title"> <?php echo $ques[0]['course_title'];?></h4>
                                </div>
                                <div class="card-body">
					 
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

<div class="card">
                                <div class="card-header">
								   	<input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
								   
                
                                    <h4 class="card-title"><?php  echo "".$question['question']."</b>";  ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="answer-list ">
                                       <?php

			//echo $index ." ". $question['question']."";

			//echo "<br/>";
			 
			 
			foreach($anss as $ans)
			{
				$anss_arr=explode(":",$ans);
				?>
				<div class="form-check  question-check">
				
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer" value=<?php echo $anss_arr[0];?>"  >
                                            <label class="form-check-label" for="inlineRadio2"><?php echo  $anss_arr[1];;?></label>
                                        </div>
			<?php
			
	 
				
				// echo "<input type='radio' id='answer_q".$index."' name='answer_q".$index."' value='".$anss_arr[0]."'>";
				// echo  $anss_arr[1];

				//echo " " .$anss_arr[2];

				
			}
			//echo $question['allanswer']." " .$question['is_correct'];

			 echo '</div>';
			echo ' <div class="d-flex justify-content-between">';
			
			 
			if($no_of_ques==$index)
			{
				echo '<br/><input type="submit" name="next" class="next btn btn-primary pull-right action-button" value="Submit"/>';
			}
			else
			{
				echo '<button type="button"  name="next"   class="next btn btn-primary btn-next  action-button">
				<span class="align-middle d-sm-inline-block d-none">Next</span>
				<i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
			</button>';
			//echo '<input type="button" name="next" class="next btn btn-primary pull-right action-button" value="Next"/>';
		}

			if($index==1 || $next_que==$question['question_id'])
			{
				
			}
			else
			{
				 echo ' <button type="button" class="btn btn-primary btn-prev previous action-button-previous">
				 <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
				 <span class="align-middle d-sm-inline-block d-none">Previous</span>
			 </button>';
			 

			}
			echo '</div>';
			


echo '</div> </fieldset></div>';
			 
			$index++;

		}
 }
 else
 {
    
		                       echo '  <label>No question there. Please Check out later ';
 }
?>
<!-- <input type="submit" name="add_user_test" id="add_user_test" value="Submit"> -->

  
                                       
                                        
                                   
                                </div>
                            </div>
							</form>
                                        </div>
                                   
                                    </div>
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