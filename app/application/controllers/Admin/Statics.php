<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Statics extends Kodakil_Controller{
	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Statics_model');
	}
	public function index(){
		$header_data 			= new StdClass;
		$data 					= new StdClass;
		$header_data->mainMenu 	= 'Statics';
		$header_data->subMenu 	= 'StaticsList';
		$data->staticsInfo      = $this->Statics_model->getStaticsInfo();
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/statics',$data);
		$this->load->view('Admin/footer');
	}

	public function add(){
		$header_data 			= new StdClass;
		$data 					= new StdClass;
		$header_data->mainMenu 	= 'Statics';
		$header_data->subMenu 	= 'StaticsAdd';
		if($this->input->post()){
			$dataPost = $this->GetAllPosts();
			$dataPost->statics_link = url_seo($dataPost->statics_name);
			if ($this->Statics_model->addStatics($dataPost)){
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/statics_add',$data);
		$this->load->view('Admin/footer');
	}

	public function deleteStatics($Id){
		if($this->Statics_model->deleteStatics($Id)){
			redirect(admin_url('Statics'));
		}else{
			redirect(admin_url('Home'));
		}
	}

	public function editStatics($Id){
		$header_data	 		= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Statics';
		$header_data->subMenu 	= 'StaticsList';
		if($this->input->post()){
			$dataPost = $this->GetAllPosts();
			$dataPost->statics_link = url_seo($dataPost->statics_name);
			if ($this->Statics_model->updateStatics($dataPost,$Id)){
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		$data->getStatics  		= $this->Statics_model->getStatics($Id); 
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/statics_edit',$data);
		$this->load->view('Admin/footer');
	}

	public function editStatus($Id,$newInfo){
		if($this->Statics_model->editStatus($Id,$newInfo)){
			redirect(admin_url('Statics'));
		}else{
			redirect(admin_url('Home'));
		}
	}
}
?>