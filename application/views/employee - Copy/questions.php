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
                                <div class="card-header">
									<?php
                                            	$this->load->helper('secure');
                                            	$user_id=encrypt_url($this->session->userdata('user_id'));
                                            	?>
                                    <h4 class="card-title"> Quiz</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 mb-2text-center">
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
                </section>
                <!-- Input Mask End -->

            </div>
        </div>
    </div>
    <!-- END: Content-->