	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Online Courses">
		<!-- Meta Description -->
		<meta name="description" content="Online Courses">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title> Learning Management</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/linearicons.css">
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.css">
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/magnific-popup.css">
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/nice-select.css">							
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/animate.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/owl.carousel.css">			
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/jquery-ui.css">			
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/main.css">
			<link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css?ver=<?php echo time();?>">
		</head>
		<body class="login">	
		  <header id="header" id="home">
          
	  		  </header><!-- #header -->

<?php
	
	echo $contents;
?>
	


			<script src="<?php echo base_url();?>asset/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="<?php echo base_url();?>asset/js/vendor/bootstrap.min.js"></script>			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="<?php echo base_url();?>asset/js/easing.min.js"></script>			
			<script src="<?php echo base_url();?>asset/js/hoverIntent.js"></script>
			<script src="<?php echo base_url();?>asset/js/superfish.min.js"></script>	
			<script src="<?php echo base_url();?>asset/js/jquery.ajaxchimp.min.js"></script>
			<script src="<?php echo base_url();?>asset/js/jquery.magnific-popup.min.js"></script>	
    		<script src="<?php echo base_url();?>asset/js/jquery.tabs.min.js"></script>						
			<script src="<?php echo base_url();?>asset/js/jquery.nice-select.min.js"></script>	
			<script src="<?php echo base_url();?>asset/js/owl.carousel.min.js"></script>										<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" ></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
			<script type='text/javascript'>
		var baseURL= "<?php echo site_url();?>";
		 var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
		</script>
			<script src="<?php echo base_url();?>asset/js/mail-script.js"></script>	
			<script src="<?php echo base_url();?>asset/js/main.js"></script>	
			<script src="<?php echo base_url();?>asset/js/stepper.js?ver=<?php echo time();?>"></script>
					<script src="<?php echo base_url();?>asset/js/custom.js?ver=<?php echo time();?>">"></script>
					<script src="<?php echo base_url();?>asset/js/pricing.js?ver=<?php echo time();?>"></script>
		</body>
	</html>