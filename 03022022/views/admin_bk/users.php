





      <div class="right_col" role="main" style="min-height: 1381px;">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                <h3>Users </h3>

              </div>

              <div class="title_right">

               <a class="btn btn-warning pull-right" href="<?php echo base_url('admin/add_user');?>" name="add_partner" id="add_partner" >Add User</a>

              </div>



           

            </div>

                  <?php

                      $msg=$this->session->flashdata('msg');

                     if(isset($msg))

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

                    <input type="hidden" name="tname" id="tname" value="user">

                    <div class="alert alert-success" role="alert" id="success_message" style="display:none">User Delete Completed</div>

        

                    <table id="clientTable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">

                      <thead>

                        <tr role="row">

                          <th></th>

                          <th>Name

                          </th>

                          <th>Email Id</th>

                          <th>Mobile</th>

                          <th>Role</th>

                          <th>Status</th>

                           

                        </tr>

                      </thead>



          <tbody>   

                       

                      <?php

                     





                      $this->load->helper('secure');

                      foreach($clients as $client)

                      {   

                                             $this->load->helper('secure');

                        $id=encrypt_url($client['id']);



                      

                                                   

                                                 

                        echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['name'])."</a></td>";

                        echo "<td>".$client['email']."</td>";

                              echo "<td>".$client['mobile']."</td>";

                        echo "<td>".$client['role']."</td>";

                        

                        echo "<td>Active</td>";

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

                <p class="modal-body-del">Are you sure you want to delete ?</p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" id="confirm-cancel-btn" data-dismiss="modal">

                    Cancel</button>

                         <button type="button" class="btn btn-danger" id="confirm-del-btn" data-dismiss="modal">

                    Confirm</button>

            </div>

        </div>

    </div>

