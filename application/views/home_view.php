<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!--link the bootstrap css file-->
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/custom.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/creative.css"); ?>">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top affix-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home">BinaryLife</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

    <header>
    	<div class="jumbotron text-center">
  			<h1>Dare to try?</h1> 
 			<p>Give us your email address. We will send you login account right away!</p> 
 		 	<form class="form-inline">
  				<div class="input-group">
     		 		<input type="email" class="form-control" size="50" placeholder="Email Address" required>
     		 			<div class="input-group-btn">
        				<button type="button" class="btn btn-danger">Send me!</button>
     	 				</div>
    			</div>
  			</form>
		</div>

		<div class="row">
	    	<div class="col-xs-6 col-md-8 col-lg-10 vcenter">
	        	<p>Copyright © 2016 BinaryLifeBlog. All Rights Reserved.</p>
	    	</div>
		</div>
    </header>




<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
