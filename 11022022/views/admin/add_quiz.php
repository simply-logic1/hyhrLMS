   <!-- Begin Page Content -->
   <div class="container-fluid">

 
<div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Add Questions & Answers</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/quiz');?>"  name="back_btn" id="back_btn"  class="custom-btn-main d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
 
</div>
</div>
<div class=" card-main-div col-lg-12">

                            <div class="card shadow-cs position-relative">
                                 
                                <div class="card-body">
                                <div class="alert alert-danger" style="display:none" id="show_error">All Fileds Required</div>

                          
<?php
    ?>
   
                

<form id="add_test" name="add_test" action="" method="post">

                                                    <div class="form-group"  >
                                                               
                                                                    <select class="form-control custom-select-value" name="video_id" id="video_id">



                                      <option value="15">Select Title</option>

                                      <?php 
                                      
                                        foreach($posts as $course)

                                        {

                                          $this->load->helper('secure');

                                            $id=encrypt_url($course['id']);

                                            echo "<option value='".$id."'>".$course['course_title']."</option>";

                                        }

                                        ?>

                                      

                                    </select>

                                    <input type="hidden" class="form-control custom-select-value" name="quiz_type" id="quiz_type"  value="quiz" placeholder="Description">   

                                                    </div>

     <div class="new_question" id="new_question">

    <div class="form-group">

        <input type="text" class="form-control" name="question" id="question" placeholder="Question">

    </div>

    <div class="input-group  new_answer" id="new_answer">

           

         <span class="input-group-addon" id="basic-addon1"><input type="radio" name="crt_ans" id="crt_ans"></span>

         

            <input id="answer"   name="answer[]" type="text" class="form-control"  aria-describedby="basic-addon1" placeholder="Answer Choice" />

           <span class="input-group-addon" id="basic-addon2"><i class="fa fa-trash" id="del" name="del"></i></span></span>

        

           

          </div>

        </div>
        <div class="text-center align-items-center justify-content-end mb-4 mt-4">

        <button class="btn btn-quiz shadow-sm   text-center" type="button" id="add_question" name="add_question">Add Question</button>
        </div<

  </form>
  
<div class="row">

<div class="col-sm-12 col-md-12">


    <div class="ques_list" id="ques_list">

      





    </div>

    </div>

    </div>
                                 
                                    
                                 
                            </div>

                        </div>
</div>
 