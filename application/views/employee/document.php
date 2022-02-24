    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Document</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a   href="  <?php echo base_url('library/'.$user_id);?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Document 
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
                                                 <th> Title </th>
                          <th> Category</th>
                          <th>Date</th>
                          <th>Download</th>
                                            </tr>
                                        </thead>
										<tbody>
										 <?php

$this->load->helper('secure');
 
                      
foreach($clients as $client)
{   

  $this->load->helper('secure');
  $id=encrypt_url($client['id']);


$docUrl=base_url('asset/course_content/'.$client["course_filename"]);
                           
//  echo "<tr><td><input type='hidden' name='emp_id' id='emp_id' value='".$id."'></td><td><a href='".base_url('admin/profile/'.$id)."'>".ucwords($client['first_name'])." " .ucwords($client['last_name'])."</a></td>";admin/employee/'
echo "<tr> <td> ".ucwords($client['course_title']) ." </td>";
echo "<td>";
 
$cat_array=explode(',',$client['category']);
       
if($client['category'] !='')
{
echo '<div class="my-1 py-25">';
 $this->load->helper('secure');


foreach($category as $cat)
{
  foreach($cat_array as $arr)
  {

    if($arr==$cat['id'])
    {
      $sid=encrypt_url($cat['id']);
     // echo '<a id="view_category" type="button" data-catid="'.$cat['id'].'" href="'.base_url("library/category/".$sid).'"class="view_category is_btn_link"> <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span></a></button>";
     echo '  <span class="badge rounded-pill badge-light-info me-50">'.$cat['category_name']."</span> </button>";
    }
     
  }

}
echo "</div>";
}


 
 
echo "</td>";
$timestamp1= strtotime($client['created_on']); 
$new_date1 = date('M d,Y', $timestamp1);
  
  echo "<td>".$new_date1."</td>";
  echo "<td>";
  ?>
  <a href="<?php echo $docUrl; ?>" download="<?php echo $client['course_filename'];?>">Download</a>
  <?php
  
 echo "</td>";
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