
   
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
        <h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Document</h1>
        <div class="col-lg-6 text-right align-items-center justify-content-end mb-4">
        
      
        <a href="<?php echo base_url('admin/add_document');?>" name="add_doc" id="add_doc"  class="custom-btn-main d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">  Add Document</a>
       
</div>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body card-table">
            <?php
                      $msg=$this->session->flashdata('doc_msg');
                     if(isset($msg))
                     {
                      $message = $this->session->flashdata('doc_msg');
                      ?>
                      <div class="alert alert-success"><?php echo $message; ?></div>

                      <?php
                     }

                     
                   ?>
                   <div class="alert alert-success assign-status"></div>
            <div class="alert alert-success" role="alert" id="success_message" style="display:none">Document Deleted Successfully</div>
                <div class="table-responsive">
                    <table class="table table align-items-center table-flush" id="docTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr role="row">
                          <th></th>
                          <th>Title
                          </th>
                          <th>Category</th>
                          <th>Date </th>
                          <th>Action</th>

                           
                        
                        </tr>
                        <input type="hidden" name="tname" id="tname" value="document">
                        </thead>
                     
                        <tbody>
                             
                            
                            <?php

$this->load->helper('secure');
                      
foreach($clients as $client)
{   

  $this->load->helper('secure');
  $id=encrypt_url($client['id']);

$baseurl=base_url('asset/course_content');

$docUrl= $baseurl."/".$client['filename'];             $cat_array=explode(',',$client['category']);   

//  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
echo "<tr><td>  
<input type='hidden' name='id' id='id' value='".$id."'></td><td><a href='".$docUrl."' data-fancybox='gallery' data-caption='". $client["course_filename"]."' >".ucwords($client['course_title']) ."</a> </td>";
echo "<td>";
$counts=count($cat_array);
$i=1;
foreach($category as $cat)
{
   foreach($cat_array as $arr)
   {
          
     if($arr==$cat['id'])
     {
       $sid=encrypt_url($cat['id']);
      
       echo $cat['category_name'];
       if($i<$counts)
       {
         echo ",";
       }
       $i++;
     }
      
   }

}
 
echo "</td>";
  
  echo "<td>".$client['created_on']."</td>";
  echo '<td><div id="course">	<input type="hidden" id="course_id" name="course_id" value="'.$id.'" >
  <button type="button" class="custom-btn-sub nd-none d-sm-inline-block btn btn-sm   shadow-sm" id="assign_video_emp"   >Assign Ambassadors</button></div></td>';
  echo "</tr>";
}
?>
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Invite Ambassador</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="alert alert-success" id="invite_alert" style="display:none">
          <p id="invite_msg"></p>
        </div>
          
      <input id="invite_emp_email" class="form-control" placeholder="Email Id" name="invite_emp_email" type="email" required="required">
       <p id="invite_error" class="error"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="send_invite_emp" id="send_invite_emp" >Send</button>
      </div>
    </div>

  </div>
</div>
<div id="del_cenmodel" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title">Confirmation
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
            </div>
            <div class="modal-body modal-body-del">
                <p class="modal-body-del">Are you sure you want to delete document ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="confirm-cancel-btn" data-dismiss="modal">
                    Cancel</button>
                         <button type="button" class="btn btn-danger" id="confirm-del-btn" data-dismiss="modal">
                    Confirm</button>
            </div>
        </div>
        
    </div>
</div>
<div id="assign_video_emp_content" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Assign Document to Ambassador
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
            </div>
            <div class="modal-body modal-body-del">
            	    <div class="row">
            	    	<div class="col-sm-6">
                      <input type="hidden" name="type" id="assign_type" class="assign_type" value="document">
            	    	  <label>
					      <input type="checkbox" value="all" class="check" id="checkAllEmp"> Select All
					    </label>
					</div>
            	    </div>
                
                	<div class="row">
                	<?php 

                		 $this->load->helper('secure');
                        
                		foreach($employees as $employee)
                		{

                			$secure_id=encrypt_url($employee['id']);

                			echo "<div class='col-sm-6'><input type='checkbox' class='checkemp' id='emp_id[]' name='emp_id' value='".$secure_id."'> ";
                			echo $employee['first_name']." ".$employee['last_name'];
                			echo "</div>";
                		}
                	?>
                
 
					</div>
				            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="confirm-assign-btn" data-dismiss="modal">
                    Cancel</button>
                         <button type="button" class="btn btn-primary" id="confirm-assign-btn" data-dismiss="modal">
                    Confirm</button>
            </div>
        </div>
    </div>
</div>