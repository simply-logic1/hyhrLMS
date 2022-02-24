<div class="right_col" role="main" style="min-height: 1381px;">
          <div class="">

<div class="row top_tiles">
  <?php
  $acc_type=$this->session->userdata('acc_type');
                   if(($acc_type=='Super Admin')||($acc_type=='All Access'))
                   {
                    ?>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="<?php echo base_url('admin/client');?>" >
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php print $no_of_client['no_of_list'];?></div>
                  
                  <h3>Ambassador</h3>
                 
                </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="<?php echo base_url('admin/videos');?>" >
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php print $no_of_video['no_of_list'];?></div>
                  <h3>Videos</h3>
                  
                  
                  
                </div>
                </a>
              </div>
              <?php
            }
            else if(($acc_type=='Video'))
                   {
                    ?>
            
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="<?php echo base_url('admin/videos');?>" >
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php print $no_of_video['no_of_list'];?></div>
                  <h3>Videos</h3>
                  
                  
                  
                </div>
                </a>
              </div>
              <?php
            }
             else if(($acc_type=='Retail'))
                   {
                    ?>
            
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="<?php echo base_url('admin/client');?>" >
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php print $no_of_client['no_of_list'];?></div>
                  
                  <h3>Retail Partner</h3>
                 
                </div>
                </a>
              </div>
              <?php
            }
             else if(($acc_type=='Quiz'))
                   {
                    ?>
            
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
             <a href="<?php echo base_url('admin/quiz');?>" >
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php print $no_of_quiz['no_of_list'];?></div>
                  
                  <h3>Retail Partner</h3>
                 
                </div>
                </a>
              </div>
              <?php
            }
            ?>
            </div>
  </div>
</div>