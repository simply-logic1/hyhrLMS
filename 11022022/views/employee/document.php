<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Document </h3>
              
            </div>
            <div class="row">
               
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Title </th>
                          <th> File name </th>
                          <th>Date</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php

$this->load->helper('secure');
                      
foreach($clients as $client)
{   

  $this->load->helper('secure');
  $id=encrypt_url($client['id']);


                           
                           
//  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
echo "<tr><td><input type='hidden' name='id' id='id' value='".$id."'></td><td>".ucwords($client['media_title']) ." </td>";
echo "<td>".$client['filename']."</td>";
  
  echo "<td>".$client['created_on']."</td>";
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
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>