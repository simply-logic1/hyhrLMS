<!DOCTYPE html>
<html>
	<head>
	 	<title>Home-Online Couses </title>
	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	 		 <link href="<?php echo base_url();?>asset/css/style.css?ver=<?php echo time();?>" rel="stylesheet">
	 		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- jQuery library -->
	</head>


	<body>
		 <div class="container">
		 	<?php 
		 	echo $this->session->userdata('logged_in');
		 	$name=$this->session->userdata('user_name');
		 	echo $name;
		 	$id=$this->session->userdata('user_id');
		 	echo $id;
		 	if($this->session->userdata('logged_in')===true)
		 	  {

		 	  	//if($this->session->userdata('user_type')==='organization ')
		 	  	$user_type=$this->session->userdata('user_type');
		 	  	switch ($user_type) {
		 	  		case 'organization':
		 	  			?>
		 	  			<div class="container">
				   

				   <!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		   <h1>Organization</h1>
		</nav>
		<div id="sidebar-wrapper">
		  <ul class="sidebar-nav">
		  
		    <li> <a href="<?php echo site_url().'dashboard';?>">Dashboard</a>

		    </li>
		    <li>
		    	<a  href="<?php echo site_url().'account';?>">Account</a>
		    </li>
		    <li> <a href="<?php echo site_url().'employee';?>">Employee</a>

		    </li>
		    <li><a href="<?php echo site_url().'analytics/'.$name."".$id;?>">Analytics</a></li>
	

		    
		  </ul>
		  <hr/>
		  <ul>
		  	<li><a href="<?php echo site_url().'chennals';?>" >Chennals</a></li>
		  		    <li><a href="<?php echo site_url().'logs';?>" >Logs</a></li>
		    <li><a href="<?php echo site_url().'logout';?>">Logout</a></li>
		  </ul>
		</div>
		 	  			<?php

		 	  			break;
		 	  		case 'employee':
		 	  		?>
<div class="container">
				   

				   <!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		   <ul>
		   	<li>Employee</li>

		   </ul>
		</nav>
		<div id="sidebar-wrapper">
		  <ul class="sidebar-nav">
		  
		    <li> <a href="<?php echo site_url().'library';?>">Home</a>

		    </li>
		  		    
		    <li><a href="<?php echo site_url().'library-list';?>">Courses</a></li>
		   
		    <li><a href="<?php echo site_url().'logout';?>">Logout</a></li>

		    
		  </ul>
		</div>
		 	  		<?php
		 	  		
		 	  		
		 	  	}
		 	  	

            ?>
		             
            <?php

		}
		 	  else
		 	  {
		 	 ?>
		 	 	
            	  <header>
		    	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				  <ul class="navbar-nav">
				    <li class="nav-item active">
				      <a class="nav-link" href="#">Active</a>
				    </li>
				 	<li class="nav-item"><a class="nav-link" href="<?php echo site_url().'home/index';?>" >Home</a></li>
		    		<li class="nav-item"><a class="nav-link" href="<?php echo site_url().'home/login';?>" >Login</a></li>
		    		<li class="nav-item"><a class="nav-link" href="<?php echo site_url().'home/signup';?>" >Signup</a></li>
		    		<li class="nav-item"><a class="nav-link" href="<?php echo site_url().'home/contact';?>" >Contact</a></li>
		    		
				  </ul>
				</nav>
		   
		    </header>
		 	 <?php

		 	  }
		 	?>
		  

		   


<?php

    echo $contents;

	

?>
		    <footer>
		    	<section class="footer-section">
		    	  <p>This is footer tag</p>
		    	</section>
		    </footer>
		  
		 </div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script type='text/javascript'>
		var baseURL= "<?php echo site_url();?>";
		 var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
		</script>
		<script src="<?php echo base_url();?>asset/js/custom.js?v=<?php echo time();?>"></script>
		<script src="<?php echo base_url();?>asset/js/courses.js?v=<?php echo time();?>"></script>
	
	</body>

</html>