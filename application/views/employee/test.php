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
								<h4 class="card-title">Start Quiz</h4>
									<?php
                                            	$this->load->helper('secure');
                                            	$user_id=encrypt_url($this->session->userdata('user_id'));
                                            	?>
                                     
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 mb-2 text-center">
                                              <h3 class="card-title"> <?php echo $video_details['course_title'];?></h3>
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
                </section>
                <!-- Input Mask End -->

            </div>
        </div>
    </div>
    <!-- END: Content-->