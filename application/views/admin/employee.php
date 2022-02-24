 

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
       
 

<!-- Page Heading -->
<div class="row">
<h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Ambassador Profile</h1>
<div class="col-lg-6 text-right align-items-center justify-content-end mb-4">


<a href="<?php echo base_url('admin/client');?>"  name="back_btn" id="back_btn"  class="custom-btn-main d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> &lt; Back</a>
 
</div>
</div>
        <div class="card card-video shadow mb-4">
            
            <div class="card-body card-table">  
            <div class="profile_data">
			    <h3><?php echo ucwords($emp_data['first_name'])." ".ucwords($emp_data['last_name']);?></h3>
				  <i class="fa fa-envelope user-profile-icon"></i> <?php echo $emp_data['primary_mail'];?>
          </div>
            <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
      aria-selected="true">Videos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#content-md" role="tab" aria-controls="profile-tab-md"
      aria-selected="false">Ambassador Education</a>
  </li>
 <li class="nav-item">
    <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
      aria-selected="false">Document</a>
  </li>
   
</ul>
<div class="tab-content card pt-5" id="myTabContentMD">
  <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
  <div class="table-responsive">
  <table class="table table align-items-center table-flush" id="sampleTable" width="100%" cellspacing="0">
            <table class="table table-striped" id="sampleTable">          <thead>
                <tr>
                    <th>Title</th>
                    <th>Assign Date</th>
                    <th>View Status</td>
                    <th>Quiz status</th>
                   
                    
                     

                </tr>
            </thead>
            <tbody>
                <?php
              
                 $this->load->helper('secure');
               
                    if(empty($test_report))
                    {
                      echo "<tr><td colspan='4' class='text-center'>No Data Available</td></tr>";
                    }
                    
                    foreach($test_report as $test)
                    {
                        if($test['course_type']=='video')
                        {
                        if($test['status']==1)
                        {
                            $status='Complete';
                        }
                       

                     
                        
                        $id=encrypt_url($test['rid']);
                        $eid=encrypt_url($test['empid']);
                        echo "<br/>";
                    
                        if($test['test_result']=='Completed')
                        {
                          $emp_sid=$test['empid'];
                          $res_url="<a 
                          href='".base_url('admin/test_details/'.$id.'/'.$eid)."'
                         >View</a>";
                        }
                        else
                        {
                          $res_url="";
                        }



                
                        echo "<tr>";
                        echo "<td>".$test['course_title']."</td>";
                        echo "<td>".$test['createdon']."</td>";
                        echo "<td>".$test['view_result']."</td>";
                        echo "<td>".$test['test_result']." ".$res_url."</td>";
                        
                         
                          //  echo "<td><a 
                          //  href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          // >View</a></td>";

                        echo "</tr>";
                      }
                    }
                ?>
                <tr>
                        
                </tr>
            </tbody>
        </table>

                            
                  </div>
                         
              
     
  </div>
  <div class="tab-pane fade    " id="content-md" role="tabpanel" aria-labelledby="content
  
  -tab-md">
  <div class="table-responsive">
  <table class="table table align-items-center table-flush" id="sampleTable" width="100%" cellspacing="0">
            <table class="table table-striped">

                          <thead>
                <tr>
                    <th>Title</th>
                    <th>Assign Date</th>
                    <th>View Status</td>
                    <th>Quiz status</th>
                   
                    
                     

                </tr>
            </thead>
            <tbody>
                <?php
              
                 $this->load->helper('secure');
                 
                    if(empty($test_report))
                    {
                      echo "<tr><td colspan='4' class='text-center'>No Data Available</td></tr>";
                    }
                   
                    foreach($test_report as $test)
                    {
                        if($test['course_type']=='post')
                        {
                        if($test['status']==1)
                        {
                            $status='Complete';
                        }
                       

                        $did=encrypt_url($test['id']);
                        $id=encrypt_url($test['rid']);
                        $tid=encrypt_url($test['tid']);
                        echo "<br/>";
                    

                        if($test['test_result']=='Completed')
                        {
                          $emp_sid=$test['empid'];
                          $res_url="<a 
                          href='".base_url('admin/test_details/'.$id.'/'.$eid)."'
                         >View</a>";
                        }
                        else
                        {
                          $res_url="";
                        }


                        if($test['view_status'])
                        {
                          
                          $is_view="Completed";
                        }
                        else
                        {
                          $is_view="Pending";
                        }

                
                        echo "<tr>";
                        echo "<td>".$test['course_title']."</td>";
                        echo "<td>".$test['createdon']."</td>";
                        echo "<td>".$is_view."</td>";
                        echo "<td>".$test['test_result']."".$res_url."</td>";
                        
                         
                          //  echo "<td><a 
                          //  href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          // >View</a></td>";

                        echo "</tr>";
                      }
                    }
                ?>
                <tr>
                        
                </tr>
            </tbody>
        </table>

                  </div>          

                         
              
     
  </div>
  <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
  <div class="table-responsive">
  <table class="table table align-items-center table-flush" id="sampleTable" width="100%" cellspacing="0">
            <table class="table table-striped" id="sampleTable">          <thead>
                <tr>
                    <th>Title</th>
                    <th>Assign Date</th>
                    <th>View Status</td>
                    <th>Quiz status</th>
                   
                    
                     

                </tr>
            </thead>
            <tbody>
                <?php
              
                 $this->load->helper('secure');
               
                    if(empty($test_report))
                    {
                      echo "<tr><td colspan='4' class='text-center'>No Data Available</td></tr>";
                    }
                    
                    foreach($test_report as $test)
                    {
                        if($test['course_type']=='document')
                        {
                        if($test['status']==1)
                        {
                            $status='Complete';
                        }
                       

                     
                        
                        $id=encrypt_url($test['rid']);
                        $eid=encrypt_url($test['empid']);
                        echo "<br/>";
                    
                        if($test['test_result']=='Completed')
                        {
                          $emp_sid=$test['empid'];
                          $res_url="<a 
                          href='".base_url('admin/test_details/'.$id.'/'.$eid)."'
                         >View</a>";
                        }
                        else
                        {
                          $res_url="";
                        }


                        if($test['view_status'])
                        {
                          
                          $is_view="Completed";
                        }
                        else
                        {
                          $is_view="Pending";
                        }
                
                        echo "<tr>";
                        echo "<td>".$test['course_title']."</td>";
                        echo "<td>".$test['createdon']."</td>";
                        echo "<td>".$is_view."</td>";
                        echo "<td>".$test['test_result']." ".$res_url."</td>";
                        
                         
                          //  echo "<td><a 
                          //  href='".base_url('employee/test_details/'.$id.'/'.$emp_sid)."'
                          // >View</a></td>";

                        echo "</tr>";
                      }
                    }
                ?>
                <tr>
                        
                </tr>
            </tbody>
        </table>

                            
                  </div>
                         
              
     
  </div>
   
</div>
</div>
</div>

</div>
    <!-- /.container-fluid -->

 
<!-- End of Main Content -->
