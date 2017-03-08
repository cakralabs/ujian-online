 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
    <form method="post" action="<?php echo site_url('user/upload/');?>" enctype="multipart/form-data">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
			<div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_group');?></label> 
					<select class="form-control" name="gid" id="gid" onChange="getexpiry();">
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>"><?php echo $val['group_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>

			<div class="form-group">	 
					<label>Upload File</label> 
					<input type="file" name="uploadfile" value="Import">
			</div>			

 
	<button class="btn btn-default" type="submit">Import</button>
 		<a href="<?php echo base_url(); ?>index.php/user/sample">Sample File</a>
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>
<script>
getexpiry();
</script>