  <!-- Basic Form Start -->

        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
           
         
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Edit Test</h1>
                                </div>
                                  <div class="alert alert-danger" style="display:none" id="show_error">All Fileds Required</div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form id="add_test" name="add_test" action="<?php echo base_url('edit_test_data');?>" method="post">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">Select Video </label>
                                                            </div>
                                                             <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="video_id" id="video_id">

                                      <option value="">Select Video Title</option>
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

                                          <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">1.Question  </label>
                                                            </div>
                                                             <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                   <textarea id="question" name="question[]" rows="2" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                            <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">Answers for Question 1</label>
                                                            </div>
                                                          


                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label>A)</label><input type="text" id="answer" name="answer_qno1[A]"  class="form-control" />
                                                              </div>
                                                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                <label>B)</label><input type="text" id="ans2_q1" class="form-control" name="answer_qno1[B]"  />
                                                              </div>
                                                              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"><br/></div>
                                                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label>C)</label><input type="text" id="ans3_q1" class="form-control" name="answer_qno1[C]"  />
                                                              </div>
                                                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                               <label>D)</label> <input class="form-control" type="text" id="ans4_q1" name="answer_qno1[D]" />
                                                             </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <br/>
                                                      <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">Correct Answer</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="radio" id="ans_correct_q1" name="ans_correct_q1" value="A" /><label>A</label>
                                                                <input type="radio" id="ans_correct_q1" name="ans_correct_q1" value="B" /><label>B</label>
                                                                <input type="radio" id="ans_correct_q1" name="ans_correct_q1" value="C" /><label>C</label>
                                                                <input type="radio" id="ans_correct_q1" name="ans_correct_q1" value="D" /><label>D</label>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                       <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">2.Question  </label>
                                                            </div>
                                                             <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                   <textarea id="question" name="question[]" rows="2" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                            <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">Answers for Question 2</label>
                                                            </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label>A)</label><input type="text" id="ans_q2" name="answer_qno2[A]"  class="form-control" />
                                                              </div>
                                                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                <label>B)</label><input type="text" id="ans_q2" name="answer_qno2[B]" class="form-control" />
                                                              </div>
                                                              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"><br/></div>
                                                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label>C)</label><input type="text" id="ans3_q1" class="form-control" id="ans_q2" name="answer_qno2[C]" />
                                                              </div>
                                                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                               <label>D)</label> <input class="form-control" type="text" id="ans_q2" name="answer_qno2[D]" />
                                                             </div>
                                                            
                                                        </div>
                                                    </div>  
                                                       <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 ">Correct Answer Question 2</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="radio" id="ans_correct_q2" name="ans_correct_q2" value="A"  style="margin-right:0.5rem" /><label>A</label>
                                                                <input type="radio" id="ans_correct_q2" name="ans_correct_q2"  style="margin-right:0.5rem" value="B"/><label>B</label>
                                                                <input type="radio" id="ans_correct_q2" name="ans_correct_q2"  style="margin-right:0.5rem" value="C" /><label>C</label>
                                                                <input type="radio" id="ans_correct_q2" name="ans_correct_q2"  style="margin-right:0.5rem" value="D" /><label>D</label>
                                                            </div>
                                                        </div>
                                                    </div>   
                                         <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                        <button class="btn btn-white" type="button">Cancel</button>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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