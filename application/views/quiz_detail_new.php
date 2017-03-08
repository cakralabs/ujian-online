<!DOCTYPE html>
<html class="gr__mtsnmodelmks_16mb_com" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aplikasi Ujian Online</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/unbk/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>asset/unbk/jquery.js"></script>
	</head>
	<?php $info = $this->session->userdata('logged_in'); ?>
  <body>	
	<div id="header">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">
					<div id="logo">
						<img src="<?php echo base_url(); ?>asset/unbk/logo.png">
					</div>
					<div id="welcome">
						<div id="avatar">
							<img src="<?php echo base_url(); ?>asset/unbk/avatar.png">
						</div>
						<div id="selamat">
							<p>Selamat Datang</p>
							<p><b id="nama_siswa"><?php echo $info['first_name']." ".$info['last_name']?></b></p>
							<p><a href="<?php echo site_url('user/logout');?>">Logout</a></p>
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
	</div>	<div id="notif">
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
			<div class="col-md-8">
				<div id="loginbox" class="konfirm konfirm2">
					<div id="logintitle">
						<p>Konfirmasi Test</p>
					</div>
					<div id="loginbody">
												<div class="datasiswa">
							<p class="bold">Nama Peserta</p>
							<p><?php echo $info['first_name']." ".$info['last_name']?></p>
						</div>
						<div class="datasiswa status">
							<p class="bold">Kelas</p>
							<p class="text-danger"><?php echo $info['group_name'];?></p>
						</div>
						<div class="datasiswa">
							<p class="bold">Tes</p>
							<p><?php echo $quiz['quiz_name']?></p>
						</div>
						<div class="datasiswa">
							<p class="bold">Tanggal Test</p>
						<script language="JavaScript">
function showDate()
{
	var now = new Date();
	var days = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
	var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
	function fourdigits(number)
	{
		return (number < 1000) ? number + 1900 : number;
	}

	tnow=new Date();
	thour=now.getHours();
	tmin=now.getMinutes();
	tsec=now.getSeconds();

	if (tmin<=9) { tmin="0"+tmin; }
	if (tsec<=9) { tsec="0"+tsec; }
	if (thour<10) { thour="0"+thour; }

	today = days[now.getDay()] + ", " + date + " " + months[now.getMonth()] + ", " + (fourdigits(now.getYear())) + " - " + thour + ":" + tmin +":"+ tsec;
	document.getElementById("dateDiv").innerHTML = today;
}
setInterval("showDate()", 1000);
</script>
 <div id="dateDiv">Thursday, 10 March, 2016 - 11:22:10</div>							
							<p></p>
						</div>
						<div class="datasiswa">
							<p class="bold">Waktu Test</p>
<marquee behavior="scroll" loop="-1" bgcolor="white" width="50%">
   <i>
      <font color="black">
        Hari, Tanggal dan Jam di atas

        <strong>
         <span id="time"></span>
         <div id="dateDiv"></div>
        </strong>
      </font>
   </i>
</marquee>
							<p></p>
						</div>
						<div class="datasiswa">
							<p class="bold">Alokasi Waktu Test</p>
							<p><?php echo $quiz['duration'];?> Menit</p>
						</div>
					</div>
				</div>
			</div>
					<div class="col-md-4">
					<?php 
					if($this->session->flashdata('message')){
						echo $this->session->flashdata('message');	
					}
					?>	
				<form method="post" id="quiz_detail" action="<?php echo site_url('quiz/validate_quiz/'.$quiz['quid']);?>">
					<p class="bg-warning warn"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;&nbsp;TOMBOL
 MULAI hanya akan aktif apabila waktu sekarang sudah melewati waktu 
mulai test. Tekan tombol F5 untuk merefresh halaman</p>
					<input class="btn-danger" value="MULAI" type="submit">
									</form>
				
			</div>
		</div>
	</div>
 
    <script src="<?php echo base_url(); ?>asset/unbk/script.js"></script>
  

</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>