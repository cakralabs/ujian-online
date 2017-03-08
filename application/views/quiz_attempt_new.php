<!DOCTYPE html>
<html class="gr__mtsnmodelmks_16mb_com" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>APLIKASI UNBK 2016</title>

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
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>	
	<script src="<?php echo base_url(); ?>asset/unbk/script.js"></script>
    <!--<script src="<?php echo base_url('js/basic.js');?>"></script>-->

<style type="text/css">
.options p{	
	margin-top: -27px;
}
</style>
<script>
var base_url="<?php echo base_url();?>";
var Timer;
var TotalSeconds;


function CreateTimer(TimerID, Time) {
Timer = document.getElementById(TimerID);
TotalSeconds = Time;

UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function Tick() {
if (TotalSeconds <= 0) {
alert("Time's up!")
return;
}

TotalSeconds -= 1;
UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
var Seconds = TotalSeconds;

var Days = Math.floor(Seconds / 86400);
Seconds -= Days * 86400;

var Hours = Math.floor(Seconds / 3600);
Seconds -= Hours * (3600);

var Minutes = Math.floor(Seconds / 60);
Seconds -= Minutes * (60);


var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)


Timer.innerHTML = TimeStr;
}


function LeadingZero(Time) {

return (Time < 10) ? "0" + Time : + Time;

}

//var myCountdown1 = new Countdown({time:<?php echo $seconds;?>, rangeHi:"hour", rangeLo:"second"});
setTimeout(submitform,'<?php echo $seconds * 1000;?>');

function submitform(){
alert('Time Over');
//window.location="<?php echo site_url('user/logout/');?>";
window.location="<?php echo site_url('quiz/submit_quiz/');?>";
}

function tutup(){
	$('#yakin-modal').hide();
}

function selesai(){
	if($('#yakin').is(":checked")){
		window.location = "../submit_quiz/";
	}else{
		alert('Silahkan Pilih Centang Terlebih Dahulu');
	}
}
</script>
<style type="text/css">
label.coolbox {  
	border: solid 1px #000;  
    margin:2px;
    display:inline-block;
    width:30px;
    height:30px;
    line-height:30px;
    text-align:center;
    vertical-align:middle;
    font-weight:bold;
    font-size:20px;
    border-radius: 20px;    
}
label.coolbox input {display:none;}
label.coolbox span {color:#000;}
label.coolbox input:checked + span {color:red;}
</style>
</head>
  <body>
	<style>
		.MathJax_Display {display : inline !important;}
	</style>
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
							<p><b id="nama_siswa">Peserta Test</b></p>
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
	</div>
<div class="modal" id="ragu-modal">
  <div class="modal-dialog" role="document" style="margin: 120px auto">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Test</h4>
      </div>
      <div class="modal-body">
        <span style="font-size:50px; position: absolute; top: 10px;" class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> 
		<p style="padding-left : 70px">Anda masih ragu - ragu / belum mengisi terhadap beberapa jawaban. Silakan tinjau lagi jawaban anda.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger close-modal" data-dismiss="modal" style="width: 100%">Ya</button>
      </div>
    </div>
  </div>
</div>	

<div class="modal" id="yakin-modal">
  <div class="modal-dialog" role="document" style="margin: 120px auto; width:450px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="tutup()"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Test</h4>
      </div>
      <div class="modal-body">
        <span style="font-size:50px; position: absolute; top: 10px;" class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> 
		<p style="padding-left : 70px">Anda masih memiliki waktu untuk mata uji ini <br><br> Apakah anda yakin ingin mengakhiri mata uji ini ?</p>
		
		<table style="width:100%">
			<tbody><tr>
				<td style="text-align:right"><input id="yakin" type="checkbox"></td>
				<td style="text-align:center; width: 350px;"><span class="red">CENTANG</span>, kemudian tekan tombol selesai. <br>Anda tidak akan bisa kembali ke soal<br>jika sudah menekan tombol selesai</td>
			</tr>
		</tbody></table>
      </div>
      <div class="modal-footer" style="text-align:center">
        <button type="button" id="selesai" class="btn btn-default" data-dismiss="modal" style="width:45%" onClick="selesai()">SELESAI</button>
        <button type="button" class="btn btn-danger close-modal" style="width:45%" onClick="tutup()">TIDAK</button>
	  </div>
    </div>
  </div>
</div>	

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="soal">
					<div id="soal-head">
						<div id="nomor">
							SOAL NO <span>1</span>
						</div>
						<div id="waktu">
							<span>Sisa Waktu</span>
							<span class="sisa" id="timer">
								<script type="text/javascript">window.onload = CreateTimer("timer", <?php echo $seconds;?>);</script>
							</span>	
						</div>
						<div class="clear"></div>
					</div>
					<div id="font-size">
						Ukuran font soal : <span class="a1">A</span><span class="a2">A</span><span class="a3">A</span>
					</div>
					<div id="soal-body">
<form method="post" action="<?php echo site_url('quiz/submit_quiz/'.$quiz['rid']);?>" id="quiz_form" >
<input type="hidden" name="rid" value="<?php echo $quiz['rid'];?>" id="rid">
<input type="hidden" name="noq" value="<?php echo $quiz['noq'];?>" id="noq">
<input type="hidden" name="individual_time"  id="individual_time" value="<?php echo $quiz['individual_time'];?>" id="individual_time">
 
<?php 
$abc=array(
'0'=>'A',
'1'=>'B',
'2'=>'C',
'3'=>'D',
'4'=>'E',
'6'=>'F',
'7'=>'G',
'8'=>'H',
'9'=>'I',
'10'=>'J',
'11'=>'K'
);
$jum_soal = count($questions);
foreach($questions as $qk => $question){
$no = $qk + 1;
$aktif = ($no == 1)?"active":"";
unset($jawabane);
$jawabane = array();
?>
<div id="nomor-asli-<?php echo $no; ?>" class="soal nomor-asli-<?php echo $no; ?> nomor-<?php echo $no; ?> <?php echo $aktif; ?>">
	<div class="nomor"><?php echo $no; ?></div>	
	<?php
	/*if(strpos("../../../",$question['question']) !== false){
		echo str_replace("../../../",base_url()."/upload/",$question['question']);
	}*/
	echo $question['question'];
	?>
	<div class="options-group">
		<?php 
		// multiple single choice
		if($question['question_type']==$this->lang->line('multiple_choice_single_answer')){		 
			$save_ans=array();
			foreach($saved_answers as $svk => $saved_answer){
				if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				}
			}
			?>
			<input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="1">
			<?php
			$i=0;
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
				?>
				<div class="options"><label class="coolbox">
					<input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" class="option" value="<?php echo $option['oid'];?>" <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?> ><span id="option-<?php echo $option['oid'];?>"><?php echo $abc[$i];?></span></label>&nbsp;&nbsp;<?php echo $option['q_option'];?>
					<?php 
						if(in_array($option['oid'],$save_ans)){
							//$jawabane[] = "check";
							?>
							<script type="text/javascript">
								//alert('check');
								$(document).ready(function(){
									$('.no.no-<?php echo $no; ?> span').html('<?php echo $abc[$i];?>');
									$('.no.no-<?php echo $no; ?>').addClass('done');
								});								
							</script>
							<?php
						}else{
							//$jawabane[] = "kosong";
						}
					?>
				</div>
				<?php 
				$i+=1;
				}
			}
		}
		if(in_array("check",$jawabane))
		{
			?>
			<script type="text/javascript">
				//$('#qbtn'+<?php echo $no; ?>).css( "background-color: rgb(68, 157, 68); color: rgb(255, 255, 255)" );
				//alert('<?php echo $no; ?>');
			</script>
			<?php			
		}
				
		// multiple_choice_multiple_answer	
		if($question['question_type']==$this->lang->line('multiple_choice_multiple_answer')){
			$save_ans=array();
			foreach($saved_answers as $svk => $saved_answer){
				if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				}
			}
			?>
			<input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="2">
			<?php
			$i=0;
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					?> 
					<div class="op"><?php echo $abc[$i];?>) <input type="checkbox" name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$i;?>"   value="<?php echo $option['oid'];?>"  <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?> > <?php echo $option['q_option'];?> </div> 
					<?php 
					$i+=1;
				}else{
					$i=0;					
				}
			}	
		}
				 
		// short answer	
		if($question['question_type']==$this->lang->line('short_answer')){
			$save_ans="";
			foreach($saved_answers as $svk => $saved_answer){
				if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				}
			}
			?>
			<input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="3" >
			<?php
			?>
			 
			<div class="op"> 
			<?php echo $this->lang->line('answer');?> 
			<input type="text" name="answer[<?php echo $qk;?>][]" value="<?php echo $save_ans;?>" id="answer_value<?php echo $qk;?>"   >  
			</div>
			<?php 		 
		}
			 	 
		// long answer	
		if($question['question_type']==$this->lang->line('long_answer')){
			$save_ans="";
			foreach($saved_answers as $svk => $saved_answer){
				if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				}
			}
			?>
			<input type="hidden"  name="question_type[]" id="q_type<?php echo $qk;?>" value="4">
			<?php
			?>
				 
			<div class="op"> 
			<?php echo $this->lang->line('answer');?> <br>
			<?php echo $this->lang->line('word_counts');?> <span id="char_count<?php echo $qk;?>">0</span>
			<textarea name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
			</div>	 
			<?php 	 
		}	
			
		// matching	
		if($question['question_type']==$this->lang->line('match_the_column')){
			$save_ans=array();
			foreach($saved_answers as $svk => $saved_answer){
				if($question['qid']==$saved_answer['qid']){
					// $exp_match=explode('__',$saved_answer['q_option_match']);
					$save_ans[]=$saved_answer['q_option'];
				}
			}
				 
			?>
			<input type="hidden" name="question_type[]" id="q_type<?php echo $qk;?>" value="5">
			<?php
			$i=0;
			$match_1=array();
			$match_2=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					$match_1[]=$option['q_option'];
					$match_2[]=$option['q_option_match'];			
					$i+=1;
				}else{
					$i=0;			
				}
			}
			?>
			<div class="op">
				<table>			
				<?php 
					shuffle($match_1);
					shuffle($match_2);
					foreach($match_1 as $mk1 =>$mval){
						?>
						<tr><td>
						<?php echo $abc[$mk1];?>)  <?php echo $mval;?> 
						</td><td>		
							<select name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$mk1;?>"  >
							<option value="0"><?php echo $this->lang->line('select');?></option>
							<?php 
							foreach($match_2 as $mk2 =>$mval2){
							?>
								<option value="<?php echo $mval.'___'.$mval2;?>"  <?php $m1=$mval.'___'.$mval2; if(in_array($m1,$save_ans)){ echo 'selected'; } ?> ><?php echo $mval2;?></option>
								<?php 
							}
							?>
							</select>
						</td>
						</tr>		
					<?php 
					}
				?>
				</table>
			</div>
			<?php	
		}		
		?>				
	</div>
</div>
<?php
}
?>
</form>
					</div>
					<div id="soal-foot">
						<table width="100%">
							<tbody><tr>
								<td align="left"><button type="button" id="prev-soal" class="btn btn-default"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> SOAL SEBELUMNYA</button></td>
								<td align="center"><button type="button" class="btn btn-warning ragu"><span class="glyphicon glyphicon-unchecked ragu-1 ragu-check" aria-hidden="true"></span> RAGU - RAGU</button></td>
								<td align="right"><button type="button" id="next-soal" class="btn btn-primary">SOAL BERIKUTNYA <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button></td>
								<td align="right"><button style="display:none" type="button" data-toggle="modal" data-target="#myModal" id="last-soal" class="btn btn-primary">KUMPULKAN JAWABAN<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button></td>
							</tr>
						</tbody></table>
						<!-- <table width="100%">
							<tbody><tr>
								<td align="left"><button type="button" id="prev-soal" class="btn btn-default"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> SOAL SEBELUMNYA</button></td>
								<td align="center"><button type="button" class="btn btn-warning ragu"><span class="glyphicon glyphicon-unchecked ragu-1 ragu-check" aria-hidden="true"></span> RAGU - RAGU</button></td>
								<td align="right"><button type="button" id="next-soal" class="btn btn-primary" onClick="javascript:show_next_question();">SOAL BERIKUTNYA <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button></td>
								<td align="right"><button style="display:none" type="button" data-toggle="modal" data-target="#myModal" id="last-soal" class="btn btn-primary">KUMPULKAN JAWABAN<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button></td>
								<button class="btn btn-danger"  onClick="javascript:cancelmove();" style="margin-top:2px;" ><?php echo $this->lang->line('submit_quiz');?></button>
							</tr>
						</tbody></table> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div style="right: 0px;" id="summary-button" class="">
		<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="position:relative; top:10px"></span> Daftar <br>Soal</button>
	</div>
	
	<div style="display: none;" id="summary">
		<?php 
		for($j=0; $j < $quiz['noq']; $j++ ){
		$n = $j + 1;
		$aktif = ($n == 1)?"active":"";
			?>
			<div class="no nomor-asli-<?php echo $n;?> no-<?php echo $n;?> <?php echo $aktif; ?>" id="qbtn<?php echo $n;?>">
				<p><?php echo $n;?></p>
				<span></span>
			</div>
			<!-- <div class="qbtn" onClick="javascript:show_question('<?php echo $j;?>');" id="qbtn<?php echo $j;?>" ></div> -->
			<?php 
		}
		?>
	</div>
	<div id="jumlah_soal" style="display:none"><?php echo $quiz['noq'];?></div>	
	<script>
		$(document).ready(function(){
			$('#finish').text('11 January 2016 17:00:00');
			$('#last-soal').click(function(){
				if ($('.not-done').length>0) {
					$('#ragu-modal').show();
				} else {
					if ($('.ragu-ragu').length>0) {
						$('#ragu-modal').show();
					} else {
						$('#yakin-modal').show();
					}
				}	
			})
		});
	</script>
	<script>
	var ctime=0;
	var ind_time=new Array();
	<?php 
	$ind_time=explode(',',$quiz['individual_time']);
	for($ct=0; $ct < $quiz['noq']; $ct++){
		?>
		ind_time[<?php echo $ct;?>]=<?php echo $ind_time[$ct];?>;
		<?php 
	}
	?>
	noq="<?php echo $quiz['noq'];?>";
	//show_question('0');


	function increasectime(){
		
		ctime+=1;
	 
	}
	 setInterval(increasectime,1000);
	 setInterval(setIndividual_time,30000);
	 setInterval(save_time,10000);
	// var time=<?php echo time();?>;
	 
	 
	</script>	        
  

</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>