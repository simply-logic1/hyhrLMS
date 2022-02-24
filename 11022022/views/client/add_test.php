  <!-- Basic Form Start -->

        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
           
            <div class="row">
            <div class="col-md-12 col-sm-12">
<div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Add Quiz</h1>
                                </div>
                                  <div class="alert alert-danger" style="display:none" id="show_error">All Fileds Required</div>
                            </div>
</div>
            </div>
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
                        <div class="sparkline12-list">
                           
                                  <div class="alert alert-danger" style="display:none" id="show_error">All Fileds Required</div>
                          
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <di v class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto">
                                            <div class="all-form-element-inner">
                                                <form id="add_test" name="add_test" action="<?php echo base_url('add_test_data');?>" method="post">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">Select Video </label>
                                                            </div>
                                                             <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="video_id" id="video_id">

                                      <option value="15">Select Video Title</option>
                                      <?php 
                                        foreach($courses as $course)
                                        {
                                          $this->load->helper('secure');
                                            $id=encrypt_url($course['id']);
                                            echo "<option value='".$id."'>".$course['course_title']."</option>";
                                        }
                                        ?>
                                      
                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    <div class="new_question" id="new_question">
    <div class="form-group">
        <input type="text" class="form-control" name="question" id="question" placeholder="Question">
    </div>
    <div class="form-group new_answer" id="new_answer">
            <div class="new_option form-group">
        <div class="input-group-btn">
          <div class="input-group-prepend option">
            <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div>
            <input id="answer"   name="answer[]" type="text" class="form-control" placeholder="Answer Choice" />
            <div class="input-group-append del-icon"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"></i></div> 
        </div>
           
          </div>
        </div>
    </div>
      </div>  
    </div>

    <button class="btn form-control text-center" type="button" id="add_question" name="add_question">Add Question</button>
  </form>
  

    <div class="ques_list" id="ques_list">
      


    </div>

                                                  

                    <!--  <button class="btn btn-white" type="button">Cancel</button>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Submit</button> -->
                                              
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