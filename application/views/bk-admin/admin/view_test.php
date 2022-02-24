<style>
.box-type{
    padding: 20px;
    border: 1px solid;
    margin: 20px;
}

</style>
  <div class="right_col" role="main" style="min-height: 1381px;">
          <div class="">
               <div class="page-title">
              <div class="title_left">
                <h3>Questions</h3>
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
                                                <?php
                                                $this->load->helper('secure');
                                                $user_id=encrypt_url($this->session->userdata('user_id'));
                                                ?>


<?php 


       
$index=1;

 echo '<label>Video Title : '.$test_data[0]['course_title'].'</label>';

        foreach($test_data as $question)
        {

            $anss=explode(",",$question['allanswer']);
            $answers=$question['allanswer'];
            ?>
              <div class="box-type">
                <div class="form-group-inner">
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
                                        <label class="login2 "><?php echo $index."."; echo "</label> <b>".$question['question']."</b>"; ?>
                                </div>

                           </div>
                




            <?php

            //echo $index ." ". $question['question']."";

            //echo "<br/>";
            
            foreach($anss as $ans)
            {
                $anss_arr=explode(":",$ans);
                if($anss_arr[0]==$question['correct_ans']){
            
echo '<div class="row"> 
            
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><input type="radio" class="exist_ans" checked="checked" readonly style="margin-right:0.5rem;color:green;background-color:red" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer correct_ans" value="'.$anss_arr[0].'"><b style="color:green">'. $anss_arr[1].' </b></p>
</div> </div> </div>';

            }
            else
            {
                echo '<div class="row"> 
            
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="i-checks pull-left"> <p> <input type="radio" style="margin-right:0.5rem" id="answer_q'.$index.'" name="answer_q'.$index.'" class="answer" value="'.$anss_arr[0].'">'. $anss_arr[1].' </p>
</div> </div></div>';
}
                
                // echo "<input type='radio' id='answer_q".$index."' name='answer_q".$index."' value='".$anss_arr[0]."'>";
                // echo  $anss_arr[1];

                //echo " " .$anss_arr[2];

                
            }
            //echo $question['allanswer']." " .$question['is_correct'];
            echo '</div>';
           
            



         //   echo '</div>';
            $index++;

        }

?>
<!-- <input type="submit" name="add_user_test" id="add_user_test" value="Submit"> -->


   </div>
                                        </div>
                                    </div>
                              
        <!-- Basic Form End-->