   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Survey</h1>
     
</div>
<div class=" card-main-div col-lg-12">

                            <div class="card shadow-cs position-relative">
                                 
                                
                                <?php
                                                $this->load->helper('secure');
                                                $user_id=encrypt_url($this->session->userdata('user_id'));
                                                ?>
<?php 


       
$index=1;
echo "<div class='card-header'>";
 echo '<label>'.$test_data[0]['survey_name'].'</label></div>';

        foreach($test_data as $question)
        {

            $anss=explode(",",$question['allanswer']);
            $answers=$question['allanswer'];
            ?>
            <div class="card-body">
              <div class="box-type">
                <div class="form-group-inner">
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" name="question<?php echo $index;?>" id="question" value="<?php echo $question['qid'];?>">
                                        <label class="login2 "><?php echo $index."."; echo "</label> <b>".$question['question']."</b>"; ?>
                                </div>

                           </div>
                

 </div>


            <?php

            //echo $index ." ". $question['question']."";

            //echo "<br/>";
            
            foreach($anss as $ans)
            {
                $anss_arr=explode(":",$ans);
                
            
echo '<div class="row"> 
            
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'. $anss_arr[1].' </b></p>
</div> </div>  ';

           
                
                // echo "<input type='radio' id='answer_q".$index."' name='answer_q".$index."' value='".$anss_arr[0]."'>";
                // echo  $anss_arr[1];

                //echo " " .$anss_arr[2];

                
            }
            //echo $question['allanswer']." " .$question['is_correct'];
            echo '</div>';
           
            



         //   echo '</div>';
            $index++;
            echo "</div>";

        }

?>
<!-- <input type="submit" name="add_user_test" id="add_user_test" value="Submit"> -->


    
                                                
                                 
                          

                        </div>
      </div>

 