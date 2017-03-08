<!DOCTYPE html>
<html class="gr__mtsnmodelmks_16mb_com" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>APLIKASI UNBK 2016</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>asset/unbk/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/unbk/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>asset/unbk/jquery.js"></script>
	</head>
  <body>	
	<div id="header">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">
					<div id="logo">
						<!--<img src="<?php echo base_url(); ?>asset/unbk/logo.png"> -->
					</div>
					<div id="welcome">
						<div id="avatar">
							<img src="<?php echo base_url(); ?>asset/unbk/avatar.png">
						</div>
						<div id="selamat">
							<p>Selamat Datang</p>
							<p><b id="nama_siswa"></b></p>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div style="height:30px;"></div>
		</div>
	</div>	
	<div id="notif">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div style="height:30px;"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="loginbox">
					<div id="logintitle">
						<p>User Login</p>
					</div>
					<div id="loginbody">						
						<div style="min-height: 43px;">
							<?php 
							if($this->session->flashdata('message')){
								?>
								<div class="alert alert-danger">
								<?php echo $this->session->flashdata('message');?>
								</div>
							<?php	
							}
							?>	
						</div>
						<form method="POST" action="<?php echo site_url('login/verifylogin');?>">
							<table>
							  <tbody><tr>
								<td>Username</td>
								<td><input name="email" id="username" type="text" placeholder="<?php echo 'username';?>"></td>
							  </tr>
							  <tr>
								<td>Password</td>
								<td><input name="password" id="password" type="password" placeholder="<?php echo $this->lang->line('password');?>"></td>
							  </tr>
							  <tr>
								<td></td>
								<td><input type="submit" value="LOGIN"></td>
							  </tr>
							</tbody></table>
						</form>
					</div>
					<div id="loginfooter">
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <script src="<?php echo base_url(); ?>asset/unbk/bootstrap.js"></script>    
    <script src="<?php echo base_url(); ?>asset/unbk/script.js"></script>
  

</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>