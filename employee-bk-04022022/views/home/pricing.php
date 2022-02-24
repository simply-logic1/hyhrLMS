 <!--<section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content-log col-lg-12">
              <h1 class="text-white">
                Pricing
              </h1>
              <p class="text-white link-nav"><a href="<?php echo base_url('home');?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Pricing</a></p>
            </div>
          </div>
        </div>
      </section>-->
      <!-- End banner Area -->

      <!-- Start search-course Area -->
      <section class="login pb-5">

        <div class="container">
          <div class="row justify-content-between align-items-center ">




      <!-- Pro Tier -->



                 <?php
      $i=1;
      $this->load->helper('secure');
      foreach($pricing as $price)
      {
        $title=$price['plan_title'];
        $secretid=encrypt_url($price['id']);

        $model_id="price_model".$i++;

        ?>

          <div class="col-lg-4">

        <div class="card price_card">
          <div class="card-header pricing_header">
            <h4 class="card-title text-white text-uppercase text-center"><?php echo $price['plan_title'];?></h4>
            <h3 class="card-price  text-center">$<?php echo $price['plan_price'];?>
            </h3><h5><span class="period text-white">Per User & <?php echo $price['plan_month'];?></span></h5>
          </div>

             <div class="card-body pricing-card ">
            <ul class="fa-ul">


                     <li><span class="fa-li"><i class="fa fa-check"></i></span>All Premium features</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic skills analytics</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic roles analytics </li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic channels analytics </li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Trend analytics </li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Usage analytics </li>

              <li><span class="fa-li"><i class="fa fa-check"></i></span>Monthly Status Reports</li>
            </ul>
             </div>
             <div class="card-footer price_footer">

            <a href="#<?php echo $model_id;?>" role="button" class="btn " data-toggle="modal">Get Started</a>
           </div>


        </div>
      </div>

      <div class="modal pricing_model" id="<?php echo $model_id;?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content pricing_model_content">
            <div class="modal-header">
                <h5 class="modal-title text-light">Corporate Training</h5>

            </div>
            <div class="modal-body p-4" id="result">
                     <h5 class="text-light card-price text-center">$<?php echo $price['plan_price'];?><span class="period"> per User & <?php echo $price['plan_month'];?></span></h5>
                   <div class="row">
                   <div class="col-lg-8 col-sm-7">
                   <h4 class="text-light"><?php echo $price['plan_title'];?> </h4>
                   <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa fa-check"></i></span>All Premium features</li>
                   <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic skills analytics</li>
                   <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic roles analytics </li>
                   <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic channels analytics </li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Trend analytics </li>
                 <li ><span class="fa-li"><i class="fa fa-check"></i></span>Usage analytics </li>
                 <li><span class="fa-li"><i class="fa fa-check"></i></span>Monthly Status Reports</li>

                </ul>
      </div>
      <div class="col-lg-4 col-sm-5">


           <form id="step_register" name="step_register" method="post" >
         Licenses Need Upto

        <input type="hidden" name="request_id" id="request_id" value="<?php echo $secretid;?>">
        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                          <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="no_of_lic" name="no_of_lic" class="form-control input-number" value="10" min="1" >
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div><br/>


          <button type="submit" class="btn btn-primary primary-btn" >Continue to Register</button>
        </form>
      </div>

                    </div>
            </div>

        </div>
    </div>
</div>
      <?php
    }
    if(isset($_POST['no_of_lic']))
    {
      $no_of_lic=$_POST['no_of_lic'];
      $request_id=$_POST['request_id'];
      redirect('signup/'.$request_id."/".$no_of_lic);
    }
    ?>
      <!-- Plus Tier -->



    </div>
  </div>
  <!-- Modal -->
<!-- view modal -->



<!-- modal -->
</section>
