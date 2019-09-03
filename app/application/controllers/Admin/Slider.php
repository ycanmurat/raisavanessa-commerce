<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Slider extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Slider_model');
		}
		public function index(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu 	= 'SliderList';
			$data->getSliders 		= $this->Slider_model->getSlider();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/slider',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Slider';
			$header_data->subMenu  	= 'SliderAdd';
			if ($this->input->post()){
				$sliderPost = $this->getAllPosts();
				$sliderPost->picture_info = $this->session->flashdata('sliderImage');
				if($this->Slider_model->addSlider($sliderPost)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/slider_add',$data);
			$this->load->view('Admin/footer');
		}
		public function ImageUpload(){	
		$sonuc = $this->Slider_model->SliderImageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('sliderImage', $sonuc);
			}
		}
		public function sliderStatusUpdate($Id,$newInfo){
			if($this->Slider_model->sliderStatusUpdate($Id,$newInfo)){
				redirect(admin_url('Slider'));
			}else{
				redirect(admin_url('Slider'));
			}
		}
		public function deleteSlider($Id){
			if($this->Slider_model->sliderDelete($Id)){
				redirect(admin_url('Slider'));
			}else{
				redirect(admin_url('Slider'));
			}
		}
		public function sliderSort(){
			$sort = $this->input->post('sort',true);
			$this->Slider_model->SetSort($sort);
			redirect(site_url('Admin/Slider'));
		}
	}
?>