 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
?>
   
  

<?php 
if($logged_in['su']=='1'){
	?>
   <div class="row">
 
  <div class="col-lg-12">
    <form method="post" action="<?php echo site_url('result/generate_report/');?>">
	<div class="input-group">
    <h3><?php echo $this->lang->line('generate_report');?> </h3> 
<select name="quid">
<option value="0"><?php echo $this->lang->line('select_quiz');?></option>
<?php 
foreach($quiz_list as $qk => $quiz){
	?>
	<option value="<?php echo $quiz['quid'];?>"><?php echo $quiz['quiz_name'];?></option>
	<?php 
}
?>
</select>
 	&nbsp;&nbsp;
<select name="gid">
<option value="0"><?php echo $this->lang->line('select_group');?></option>
<?php 
foreach($group_list as $gk => $group){
	?>
	<option value="<?php echo $group['gid'];?>"><?php echo $group['group_name'];?></option>
	<?php 
}
?>
	<option value="all">Semua</option> 
</select>
	&nbsp;&nbsp;
<select name="type">
	<option value="xls"> xls </option>
	<option value="pdf"> pdf</option>
</select>

 &nbsp &nbsp <button class="btn btn-info" type="submit"><?php echo $this->lang->line('generate_report');?></button>	
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
}
?>


<h3><?php echo $title;?></h3>
 
  <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('result/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

 

  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<?php 
		if($logged_in['su']=='1'){
			?>
				<div class='alert alert-danger'><?php echo 'Status hasil "pending" disebabkan oleh adanya soal uraian yang membutuhkan koreksi manual'?></div>		
		<?php 
		}
		?>
<form method="post" action="<?php echo site_url('result/remove_all');?>">			
<table class="table table-bordered">
<tr>
 <th width="5%">Pilih semua <input type="checkbox" id="select_all"/></th>
 <th>NIS</th>
<th><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
 <th><?php echo $this->lang->line('quiz_name');?></th>
 <th><?php echo $this->lang->line('status');?>
 <select onChange="sort_result('<?php echo $limit;?>',this.value);">
 <option value="0"><?php echo $this->lang->line('all');?></option>
 <option value="<?php echo $this->lang->line('pass');?>" <?php if($status==$this->lang->line('pass')){ echo 'selected'; } ?> ><?php echo $this->lang->line('pass');?></option>
 <option value="<?php echo $this->lang->line('fail');?>" <?php if($status==$this->lang->line('fail')){ echo 'selected'; } ?> ><?php echo $this->lang->line('fail');?></option>
 <option value="<?php echo $this->lang->line('pending');?>" <?php if($status==$this->lang->line('pending')){ echo 'selected'; } ?> ><?php echo $this->lang->line('pending');?></option>
  <option value="<?php echo 'Open';?>" <?php if($status=='Open'){ echo 'selected'; } ?> ><?php echo 'Open';?></option>
 </select>
 </th>
<th>Kelas</th>
<th><?php echo $this->lang->line('percentage_obtained');?></th>
<th><?php echo 'Nilai';?> </th>
<th>Siswa Waktu</th>
<th><?php echo $this->lang->line('action');?> </th>

</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="8"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}

foreach($result as $key => $val){
?>
<tr>
<td><input class="checkbox" type="checkbox" name="check[]" value="<?php echo $val['rid'];?>"></td>
 <td><?php echo $val['email'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['quiz_name'];?></td>
 <td><?php echo $val['result_status'];?></td>
 <td><?php echo $val['group_name']; ?></td>
 <td><?php echo $val['percentage_obtained'];?>%</td>
 <td><?php echo $val['score_obtained'];?></td>
 <td><?php echo gmdate("h:i:s",$val['temp_time']);?></td>
<td>
<a href="<?php echo site_url('result/view_result/'.$val['rid']);?>" class="btn btn-success" ><?php echo $this->lang->line('view');?> </a>
<?php 
if($logged_in['su']=='1'){
	?>
	<a href="javascript:remove_entry('result/remove_result/<?php echo $val['rid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
<?php 
}
?>
</td>
</tr>

<?php 
}
?>
</table>
</div>

</div>
<?php 
if($logged_in['su']=='1'){
	?>
 
<button class="btn btn-danger" type="submit">Hapus</button>
<?php } ?>
</form>
<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('result/index/'.$back.'/'.$status);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('result/index/'.$next.'/'.$status);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>





</div>
<script>
$("#select_all").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.checkbox').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

$('.checkbox').change(function(){ //".checkbox" change 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(this.checked == false){ //if this item is unchecked
        $("#select_all")[0].checked = false; //change "select all" checked status to false
    }
    
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length ){ 
        $("#select_all")[0].checked = true; //change "select all" checked status to true
    }
});
</script>