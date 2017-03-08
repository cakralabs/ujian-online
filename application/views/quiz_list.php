 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
			 
			
			?>
   
 <h3><?php echo $title;?></h3>
    <?php 
	if($logged_in['su']=='1'){
		?>
		<div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('quiz/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
	}
?>

  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
<form method="post" action="<?php echo site_url('quiz/remove_all');?>">		
<table class="table table-bordered">
<tr>
<th width="5%">Pilih semua <input type="checkbox" id="select_all"/></th>
 <th>#</th>
 <th><?php echo $this->lang->line('quiz_name');?></th>
<th><?php echo $this->lang->line('noq');?></th>
<th><?php echo $this->lang->line('action');?> </th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
$i=0;
foreach($result as $key => $val){$i++;
?>
<tr>
 <td><input class="checkbox" type="checkbox" name="check[]" value="<?php echo $val['quid'];?>"></td>
 <td><?php echo $i;?></td>
 <td><?php echo substr(strip_tags($val['quiz_name']),0,50);?></td>
<td><?php echo $val['noq'];?></td>
 <td>
<a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid']);?>" class="btn btn-success"  ><?php echo $this->lang->line('attempt');?> </a>

<?php 
if($logged_in['su']=='1'){
	?>
			
<a href="<?php echo site_url('quiz/edit_quiz/'.$val['quid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
<?php if($val['show']==1){echo '<img src="'.base_url('images/tick-icon.png').'" alt="Kuis aktif"';}?>
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
<button class="btn btn-danger" type="submit">Hapus</button>
</form>
<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('quiz/index/'.$back);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('quiz/index/'.$next);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>





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