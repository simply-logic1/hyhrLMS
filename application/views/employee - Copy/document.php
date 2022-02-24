<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Document </h3>
              <div class="breadcrumb-wrapper vs-breadcrumbs d-sm-block d-none col-12"><nav class="" aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="  <?php echo base_url('library/'.$user_id);?>">Home</a></li><li class="active breadcrumb-item" aria-current="page">Document</li></ol></nav></div>
              
            </div>
            <div class="row">
               
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     
                    <table  class="table table align-items-center table-flush" id="docTable" width="100%" cellspacing="0">
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


$docUrl=base_url('asset/course_content/'.$client["filename"]);
                           
//  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
echo "<tr> <td><a href='".$docUrl."' data-fancybox='gallery' data-caption='". $client["filename"]."' >".ucwords($client['media_title']) ." </a></td>";
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