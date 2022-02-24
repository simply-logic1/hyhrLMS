    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Quiz Results </h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a   href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Quiz Results 
                                    </li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="content-body">
               
        

                <!-- Multilingual -->
                <section id="multilingual-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title"> </h4>
                                </div>
                                <div class="card-datatable">
                                    <table id="docTable" class="dt-multilingual table">
                                        <thead>
                                            <tr>
                                               <th> Title</th>
                    <th>Date</th>
                    <th>Total Questions</td>
                    <th>Attempted Question</th>
                   <!-- <th>Score</th>-->
                   
                    
                    <th>Action</th>
                                            </tr>
                                        </thead>
										<tbody>
										   <?php
                if(empty($test_report))
                {
                    echo "<tr><td colspan='6' class='text-center'>No Data Found</tr>";
                }
               
                 $this->load->helper('secure');
                $uid=$this->session->userdata('user_id');
                          $emp_sid=encrypt_url($uid);   
                          print_r($test_report);
                    foreach($test_report as $test)
                    {
                        
                        if($test['status']==1)
                        {
                            $status='Complete';
                        }
                       


                        $id=encrypt_url($test['res_id']);
                        echo "<br/>";
                    




                
                        echo "<tr>";
                        echo "<td>".$test['course_title']."</td>";
                        echo "<td>".$test['date_of_exam']."</td>";
                        echo "<td>".$test['total_question']."</td>";
                        echo "<td>".$test['total_question']."</td>";
                      //    echo "<td>".$test['exam_score']."</td>";
                         
                           echo "<td><a 
                           href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          >View</a></td>";

                        echo "</tr>";
                    }
                ?>
 
 
                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Multilingual -->

            </div>
        </div>
    </div>
    <!-- END: Content-->