


      <div class="right_col" role="main" style="min-height: 1381px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Categories </h3>
              </div>
              
              

           
            </div>
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
                   <div class="clearfix"></div>
                   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="">
                  
               
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="alert alert-success" role="alert" id="success_message" style="display:none">Content Deleted Successfully</div>
                      
                    <div class="row">
                      <div class="col-sm-4"> 
                        <div class="cat_form">
                        <div class="cat_name">
                        <p>Category Name</p>
                        <input id="category_name" class="form-control" required name="category_name" placholder="Category Name">
                    </div>
                    <div class="cat_desc">
                        <p>Description</p>
                        <textarea id="description" class="form-control"name="descriptiion" placholder="Description"></textarea>
                    </div>
                    <div class="cat_slug">
                        <p>Slug</p>
                        <input id="slug" class="form-control" name="slug" placholder="Slug">
                    </div>


                          <input type="button" class="add_category" id="add_category" value="Add New Category">


                      </div>
                    </div>
                     
                    <div class="col-sm-8"> 
                      <?php
                       
                       $counts = array_count_values(array_column($count_courses, 'cat_id'));
                       
                      
 /*
                          $array_in = array(
                            array('id'=>1, 'title'=>'BMW'),
                            array('id'=>1, 'title'=>'BMW'),
                            array('id'=>2, 'title'=>'Mercedes'),
                        );
                        
                        $hash = array();
                        $array_out = array();
                        
                        foreach($counted as $item) {
                            $hash_key = $item['id'].'|'.$item['title'];
                            if(!array_key_exists($hash_key, $hash)) {
                                $hash[$hash_key] = sizeof($array_out);
                                array_push($array_out, array(
                                    'id' => $item['id'],
                                    'title' => $item['title'],
                                    'count' => 0,
                                ));
                            }
                            $array_out[$hash[$hash_key]]['count'] += 1;
                        }
                        
                        var_dump($array_out);
                        foreach($counted as $k => $v) {
                          $result[$k] = array_count_values($v);
                          arsort($result[$k]);
                      }
                      */
                      ?>
                    <table id="catTable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
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
                                  echo $test;
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
              </div>

              

              

              

              

              
            </div>

          
          </div>
        </div>
        <div id="del_cenmodel" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">Confirmation
                </h4>
            </div>
            <div class="modal-body modal-body-del">
                <p class="modal-body-del">Are you sure you want to delete Category ?</p>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Invite Ambassador</h4>
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