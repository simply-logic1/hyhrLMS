
   
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
        <h1 class="col-lg-6 h3 mb-2 text-gray-800 main-head">Categories</h1>
        <div class="col-lg-6 text-right align-items-center justify-content-end mb-4">
        
      
        <a data-toggle="modal" data-target="#myModal"   name="add_education" id="add_education"  class="custom-btn-main nd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Category</a>
        
</div>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body card-table">
            <?php
                      $msg=$this->session->flashdata('cat_msg');
                     if(isset($cat_msg))
                     {
                      $message = $this->session->flashdata('msg');
                      ?>
                      <div class="alert alert-success"><?php echo $message; ?></div>

                      <?php
                     }
                     ?>

            <div class="alert alert-success" role="alert" id="success_message" style="display:none">Category Deleted Successfully</div>
                <div class="table-responsive">
                    <table class="table table align-items-center table-flush" id="catTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr role="row">
                            <th></th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Slug</th>
                          <th>Count </th>
                        
                        </tr>
                        <input type="hidden" name="tname" id="tname" value="course_category">
                        </thead>
                     
                        <tbody>
                             
                            
                           <?php
                     
                     $counts = array_count_values(array_column($count_courses, 'cat_id'));
                       

                      $this->load->helper('secure');
                      
                      foreach($courses as $client)
                      {   

                        $this->load->helper('secure');
                        $id=encrypt_url($client['id']);

                      
                                                 
                                                 
                      //  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
                      echo "<tr><td><input type='hidden' name='content_id' id='content_id' value='".$id."'></td>";
                        
                         echo "<td><a href='".base_url('admin/category/'.$id)."'> ".$client['category_name']."</a></td>";
                         echo "<td>".$client['category_description']."</td>";
                        echo "<td>".$client['category_slug']."</td>";
                      
                           foreach($counts as $key =>$count)
                           { 
                              
                              if($key==$client['id'])
                              {

                                  $test=$count;
                                  
                                  break;
                              }
                              else
                              {
                               
                                $test='-';
                              }
                           }

                        echo "<td>".$test."</td>";
                        //<td><a href='".base_url('admin/content/'.$id)."'> ". $client['course_title']."</a></td>";
                        echo "</tr>";
                      }
                      ?>
 
                        </tbody>
                    </table>
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
                <p class="modal-body-del">Are you sure you want to delete category ?</p>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="alert alert-success" id="invite_alert" style="display:none">
          <p id="invite_msg"></p>
        </div>
          
     
       <p id="invite_error" class="error"></p>
	    <div class="cat_form">
                        <div class="cat_name">
                        <p>Category Name</p>
                        <input id="category_name" class="form-control" required name="category_name" placeholder="Category Name">
                    </div>
                    <div class="cat_desc">
                        <p>Description</p>
                        <textarea id="description" class="form-control"name="descriptiion" placeholder="Description"></textarea>
                    </div>
                    <div class="cat_slug">
                        <p>Slug</p>
                        <input id="slug" class="form-control" name="slug" placeholder="Slug">
                    </div>


                          


                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button"  class="add_category" id="add_category" value="Add New Category" >Add </button>
      </div>
    </div>

  </div>
</div>