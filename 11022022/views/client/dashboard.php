<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <a href="<?php echo base_url('employee/'.$id);?>">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Referrals</span>
                            <span class="info-box-number"><?php echo $client_data['no_emp'];?> </span>                               
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url('chennals/'.$id);?>">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-file-video-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Training videos</span>
                            <span class="info-box-number"><?php echo $list['list'];?> </span>                               
                        </div>
                    </div>
                </div>
            </a>
                   
        </div>
    </div>
</div>