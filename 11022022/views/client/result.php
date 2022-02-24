


<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Quiz </h5>
                                <h2> <span class="tuition-fees"></span></h2>
                               <!--  <span class="text-danger">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                                </div> -->
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
                     
                        
                            
                                <div class="product-tab-list tab-pane fade active in" id="allemplist">
                                   
                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          
         
                                    <table id="allresult"  class="table  table-bordered" style="width:100%" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                 <th  data-field="name" >Full Name</th>
                                                 <th data-field='Primary Email'>Primary Email</th>
                                              
                                                 
                                                <th data-sortable="true"            data-field="Status" >Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $this->load->helper('secure');
                                           
                                                foreach($employees as $employee)
                                               {
                                                       {$emp_id=encrypt_url($employee['id']);
                                                    echo "<tr>";
                                                   
                                                   echo "<td><input type='hidden' name='emp_id' id='emp_id' value='".$emp_id."'></td>";
                                                    echo "<td><a href='".base_url('employee/details/'.$emp_id)."'>".ucwords($employee['first_name'])." ".ucwords($employee['last_name'])."</a></td>";
                                                   // echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";
                                                    echo "<td>".$employee['primary_mail']."</td>";
                                                  
                                                 

                                                   
                                                    echo "<td><a href='".base_url('employee_result/'.$emp_id)."'>View</a></td>";
                                                    echo "</tr>";
                                               }
                                               }
                                            ?>
                                           
                                        </tbody>
                                    </table>                      </div>
                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            
                </div>
    </div>


    
