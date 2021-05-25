<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Learn to play an instrument</title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg position-sticky bg-white portfolio-navbar gradient">
	<div class="container"><a class="navbar-brand logo" href="<?php echo site_url('pages/view/index'); ?>">Instrumendous</a>
		<button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span
					class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="<?php echo site_url('pages/view/index'); ?>">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo site_url('pages/view/aboutus'); ?>">About Us</a></li>
				<?php if ($logiran == true) {
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("pages/view/learn") . '"' . '>Learn</a> </li>';
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("pages/view/upload") . '"' . '>Upload</a> </li>';
					echo '<li class="nav-item"><a class="nav-link" style="text-align: right" href="';
					echo site_url("user_authentication/logout") . '"' . '>Logout </a> </li>';
				} else {
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("user_authentication/index") . '"' . '>Login</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("user_authentication/show") . '"' . '>Register</a></li>';
				} ?>
			</ul>
		</div>
	</div>
</nav>
