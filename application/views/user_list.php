 <div class="container">

   
 <h3><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('user/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

		<div class="form-group">	 
					<form method="post" action="<?php echo site_url('user/pre_user_filter/'.$limit.'/'.$gid);?>">
					<select   name="gid">
					<option value="0"><?php echo $this->lang->line('all_category');?></option>
					<?php 
					foreach($group as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>" <?php if($val['gid']==$cid){ echo 'selected';} ?> ><?php echo $val['group_name'];?></option>
						<?php 
					}
					?>
					</select>
					 <button class="btn btn-default" type="submit"><?php echo $this->lang->line('filter');?></button>
					 </form>
			</div>
			
			
  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
<form method="post" action="<?php echo site_url('user/remove_all');?>">		
<table class="table table-bordered">
<tr>
<th width="5%">Pilih semua <input type="checkbox" id="select_all"/></th>
<th>NIS</th>
<th><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
<th>Kelas</th>
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
foreach($result as $key => $val){
?>
<tr>
<td><input class="checkbox" type="checkbox" name="check[]" value="<?php echo $val['uid'];?>"></td>
<td><?php echo $val['email'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
<td><?php echo $val['group_name'];?></td>
<td>
<a href="<?php echo site_url('user/edit_user/'.$val['uid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('user/remove_user/<?php echo $val['uid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

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

<a href="<?php echo site_url('user/index/'.$back.'/'.$gid);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('user/index/'.$next.'/'.$gid);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>





</div>
<br><br><br>
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