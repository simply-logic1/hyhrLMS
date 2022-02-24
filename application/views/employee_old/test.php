
	


  <!-- Basic Form Start -->

        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
           
         
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Start Quiz</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">

<p><b> Title </b> : <?php echo $video_details['course_title'];?>

<!--<p><b> Total Questions</b> : 10 Questions</p>-->
<?php 
	$id =encrypt_url($video_details['id']);
	
	

	?>
                                     <form id="start_test" id="start_test" method="post" 
action="<?php echo base_url('library/start_test/'.$id); ?>" >
<input type="hidden" name="video_id" id="video_id" value="<?php echo $id;?>">

<?php

if(empty($result_status))
{
    
	
	if(!$test_status)
	{
		?>

<button type="submit" class="btn btn-primary" name="take_quiz" id="take_quiz" >Start Quiz</button>
		<?php
	}
	else
	{

		?>
		<input type="hidden" name="question_id" id="question_id" value="<?php echo $test_status['question_id'];?>">
		<button type="submit" class="btn btn-primary" name="take_quiz" id="take_quiz" >Continue Quiz</button>

		<?php

	}
}
else
{
    echo '<label class="btn btn-primary" >Quiz Complete</label>';
}
?>
	
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