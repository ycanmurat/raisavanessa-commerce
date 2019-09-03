<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Meta extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Admin/Meta_model');
			$this->checkLogin();
		}
		public function index(){
			$metaData 					= new StdClass;
			$data 						= new StdClass;
			$header_data				= new StdClass;
			$header_data->mainMenu		= 'Meta';
			$header_data->subMenu		= 'MetaList';
			$data->MetaValue 			= new StdClass;
			if($this->input->post()){
				$metaData->title 		= $this->input->post('title',true);
				$metaData->description 	= $this->input->post('description',true);
				$metaData->keywords 	= $this->input->post('keywords',true);
				$metaData->rights 		= $this->input->post('rights',true);
				$metaData->author 		= $this->input->post('author',true);
				$metaData->owner 		= $this->input->post('owner',true);
				$metaData->copyright 	= $this->input->post('copyright',true);
				if ($this->Meta_model->updateMetaTag($metaData)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$data->MetaValue = $this->Meta_model->getMeta();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/meta',$data);
			$this->load->view('Admin/footer');
		}
	}
?>