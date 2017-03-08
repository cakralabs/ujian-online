<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("user_model");
	   $this->lang->load('basic', $this->config->item('language'));
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		
	 }

	public function index($limit='0',$gid='0')
	{
		$this->load->helper('form');
		
		$logged_in=$this->session->userdata('logged_in');
		 
			if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
			}
			
		$data['gid'] = $gid;	
		$data['limit']=$limit;
		$data['title']=$this->lang->line('userlist');
		// fetching user list
		$data['group']=$this->user_model->group_list();
		$data['result']=$this->user_model->user_list($limit,$gid);
		$this->load->view('header',$data);
		$this->load->view('user_list',$data);
		$this->load->view('footer',$data);
	}
	function pre_user_filter($limit='0',$gid='0'){
		$gid = $this->input->post('gid');
		redirect('user/index/'.$limit.'/'.$gid);
	}
	
	public function new_user()
	{
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
			}
			
			
		 $data['title']=$this->lang->line('add_new').' '.$this->lang->line('user');
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		 $this->load->view('header',$data);
		$this->load->view('new_user',$data);
		$this->load->view('footer',$data);
	}

	public function import()
	{
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['su']!='1'){
			exit($this->lang->line('permission_denied'));
		}
			
			
		$data['title']='Import '.$this->lang->line('user');
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		 $this->load->view('header',$data);
		$this->load->view('import_user',$data);
		$this->load->view('footer',$data);
	}

	public function sample()
	{
		$this->load->helper('download');

		$data = file_get_contents(base_url()."template/siswa.xls");
		$name = 'Import Siswa.xls';

		force_download($name, $data); 
	}

	function upload()
	{
		$config['upload_path'] = './temp/';
		$config['allowed_types'] = 'csv|xls';
		$config['max_size']	= '50000';	
		$config['remove_spaces'] = TRUE;			
				
		$this->load->library('upload', $config);
		$uplod = $this->upload->do_upload("uploadfile");
		
		$data = $this->upload->data();
		$file = $data['file_name'];
			
		if ( !$uplod )
		{		    	
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Gagal Upload </div>");			
		}
		else
		{
			$filename = './temp/'.$file;

			$this->load->library('excel');
			$objPHPExcel = PHPExcel_IOFactory::load($filename);										
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
						 					
			foreach ($cell_collection as $cell) 
			{
			    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
						 					 
			    if ($row == 1) 
			    {
			        $header[$row][$column] = $data_value;
			    } 
			    else 
			    {
			        $arr_data[$row][$column] = $data_value;
			    }
			}
						 			
			$data['header'] = $header;
			$data['values'] = $arr_data;									

			$no = 1;
			$hasil = "";
			foreach($data['values'] as $value)
			{								
				if(isset($value['B']) AND trim($value['B']) != "" AND $no > 1)	
				{	
					$data = array(
					   'email' 		=> trim($value['B']),
					   'password' 	=> md5(trim($value['B'])),
					   'first_name' => trim($value['C']),
					   'gid' 		=> $this->input->post('gid')
					);

					$this->db->insert('users', $data); 					
				}
				$no++;
			}
						
			if($this->db->affected_rows() > 0)
			{
			    $this->session->set_flashdata('message', "<div class='alert alert-success'>Import Data Siswa Sukses </div>");
			}
			else
			{
			    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Import Data Siswa Gagal </div>");			
			}			
			unlink($filename);			
		}
		redirect('user');
	}
	
		public function insert_user()
	{
	 	
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
          if ($this->form_validation->run() == FALSE)
                {
                     $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					redirect('user/new_user/');
                }
                else
                {
					if($this->user_model->insert_user()){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('data_added_successfully')." </div>");
					}else{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_add_data')." </div>");
						
					}
					redirect('user/new_user/');
                }       

	}

		public function remove_user($uid){

			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
			if($uid=='1'){
					exit($this->lang->line('permission_denied'));
			}
			
			if($this->user_model->remove_user($uid)){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
					}else{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_remove')." </div>");
						
					}
					redirect('user');
                     
			
		}

	public function edit_user($uid)
	{
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
			 $uid=$logged_in['uid'];
			}
			
			$data['uid']=$uid;
		 $data['title']=$this->lang->line('edit').' '.$this->lang->line('user');
		// fetching user
		$data['result']=$this->user_model->get_user($uid);
		$this->load->model("payment_model");
		$data['payment_history']=$this->payment_model->get_payment_history($uid);
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		 $this->load->view('header',$data);
			if($logged_in['su']=='1'){
		$this->load->view('edit_user',$data);
			}else{
		$this->load->view('myaccount',$data);
				
			}
		$this->load->view('footer',$data);
	}

		public function update_user($uid)
	{
		
		
			$logged_in=$this->session->userdata('logged_in');
						 
			if($logged_in['su']!='1'){
			 $uid=$logged_in['uid'];
			}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
           if ($this->form_validation->run() == FALSE)
                {
                     $this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
					redirect('user/edit_user/'.$uid);
                }
                else
                {
					if($this->user_model->update_user($uid)){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('data_updated_successfully')." </div>");
					}else{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_update_data')." </div>");
						
					}
					redirect('user/edit_user/'.$uid);
                }       

	}
	
	
	public function group_list(){
		
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		$data['title']=$this->lang->line('group_list');
		$this->load->view('header',$data);
		$this->load->view('group_list',$data);
		$this->load->view('footer',$data);

		
		
		
	}
	
	
		public function insert_group()
	{
		
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
	
				if($this->user_model->insert_group()){
                $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('data_added_successfully')." </div>");
				}else{
				 $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_add_data')." </div>");
						
				}
				redirect('user/group_list/');
	
	}
	
			public function update_group($gid)
	{
		
		
			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			}
	
				if($this->user_model->update_group($gid)){
                echo "<div class='alert alert-success'>".$this->lang->line('data_updated_successfully')." </div>";
				}else{
				 echo "<div class='alert alert-danger'>".$this->lang->line('error_to_update_data')." </div>";
						
				}
				 
	
	}
	
	
	function get_expiry($gid){
		
		echo $this->user_model->get_expiry($gid);
		
	}
	
	
	
	
	public function remove_group($gid){

			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			} 
			
			if($this->user_model->remove_group($gid)){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
					}else{
						$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_remove')." </div>");
						
					}
					redirect('user/group_list');
                     
			
		}

	function logout(){
		
	$this->session->unset_userdata('logged_in');		
					
	redirect('login');
		
	}
	function remove_all(){
		$data = $this->input->post("check");
		
		$delete = $this->user_model->remove_all($data);
		if($delete){
			  $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_remove')." </div>");
		}
		redirect('user');
	}
	/* function import(){
		$this->load->library(array('Excel','upload'));
		$this->load->helper(array('file'));
		$fileName = time().$_FILES['file']['name'];
        $config['upload_path'] = realpath(APPPATH . '../xls'); //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
		//echo $fileName;
		$this->upload->initialize($config);
		
		if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
		
        $inputFileName = FCPATH .'/xls/'.$fileName;
         
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
				
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
			$sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
			$i=0;
		  for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    "password"=> $rowData[0][1],
                    "email"=> $rowData[0][0],
                    "nama_depan"=> $rowData[0][2],
                    "nama_belakang"=> $rowData[0][3], 
					"kontak"=>$rowData[0][4]
                ); 
                
              if($this->user_model->import($data)){
				  $i++;
			  }
				
                     
            }
		
			  unlink($inputFileName);
			  if($i>0){
				   $this->session->set_flashdata('message', "<div class='alert alert-success'> ".$i." data berhasil di import </div>");
				  
			  } else {
				  $this->session->set_flashdata('message', "<div class='alert alert-danger'> import gagal</div>");
			  }
			  
		 
		redirect('user');
	} */
}
