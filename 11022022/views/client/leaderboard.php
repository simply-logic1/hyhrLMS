


<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Leaderboard </h5>
                                <h2> <span class="tuition-fees"></span></h2>
                            
                            </div>
                        </div>
                    </div>
        
              
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-sm-6">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">

 <div class="alert alert-success" id="del_alert" style="display:none" >
          <p >Deleted Complete</p>
        </div>
    </div>
</div>
</div>

    
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     
                        
                            
                          
                                   
                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th> Name</th>
                                        <th>Total Quiz Score</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>



                                <?php
 
                                
                                 $tot_ques=$quiz_details[0]['all_question'];

                                foreach($quiz_details  as $det)
                                {   
                                    if($det['Rank']==0)
                                    {
                                        $rank='-';

                                    }
                                    else
                                    {
                                        $rank=$det['Rank'];
                                    }
                                    if($det['status']==1)
                                    {
                                    echo "<tr>";  
                                      echo "<td>".$rank."</td>";
                                    echo "<td>".$det['first_name']." ".$det['last_name']."</td>";
                                    $score=($det['score']/$tot_ques)*100;

                               
                                  echo "<td>".$det['score']."</td>";
                                  echo '<td><div class="progress">
  <div class="progress-bar" role="progressbar"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$score.'%">
    '.floor($score).' %
  </div>
</div></td>';
                                  echo "</tr>";
                                }
                            }

                                ?>          
        
                                  </div>
                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              
                              
                            
                </div>
    </div>


    
