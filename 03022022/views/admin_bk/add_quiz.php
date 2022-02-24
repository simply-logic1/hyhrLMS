<div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

               <div class="page-title">
               
               <div class="back-btn"><a class="btn btn-primary" href="javascript:window.history.go(-1);">&lt; Back</a></div>
              <div class="title_left">

                <h3>Add Questions & Answers</h3>

              </div>

            </div>

             <!-- form start -->

               <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

               

                  <div class="x_content">

                    <br />

                   <?php 

       

         ?>

                                  <div class="alert alert-danger" style="display:none" id="show_error">All Fileds Required</div>

                          
                    <?php
                        
                       
                                        
                                        $res = array();
foreach (array_merge($courses,$posts)  as $value) 
{
    $res[] =  $value;
}
 
                ?>


                                                <form id="add_test" name="add_test" action="" method="post">

                                                    <div class="form-group" style="padding: 0rem 4rem;">
                                                                <label class="login2 ">Select Title </label>

                                                                    <select class="form-control custom-select-value" name="video_id" id="video_id">



                                      <option value="15">Select Title</option>

                                      <?php 
                                      
                                        foreach($res as $course)

                                        {

                                          $this->load->helper('secure');

                                            $id=encrypt_url($course['pid']);

                                            echo "<option value='".$id."'>".$course['content_title']."</option>";

                                        }

                                        ?>

                                      

                                    </select>

                                                             

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

        <button class="btn form-control text-center" type="button" id="add_question" name="add_question">Add Question</button>

  </form>

    </div>

      </div>  

    </div>



    

  

</div>

<div class="row">

<div class="col-sm-12 col-md-12">

    <div class="ques_list" id="ques_list">

      





    </div>

    </div>

    </div>



  </div>

</div>

</div>

</div>

</div>

</div>



  



               