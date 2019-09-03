<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Information extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin/Information_model');
		$this->checkLogin();
	}

	public function index(){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Information';
		$header_data->subMenu 	= 'InformationList';
		$data->getInformation 	= $this->Information_model->getInformation();
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/information',$data);
		$this->load->view('Admin/footer');
	}
	public function add(){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Information';
		$header_data->subMenu 	= 'InformationAdd';
		if ($this->input->post()) {
			$information_title 		= $this->input->post('information_title',true);
			$information_title_slug = url_seo($information_title);
			$description 			= $this->input->post('description',true);
			$information_content 	= $this->input->post('information_content',true);
			$information_image 		= $this->session->flashdata('Image');
			$inputArray 			= array('information_title' => $information_title,
											'information_content' => $information_content,
											'information_image' => $information_image,
											'information_title_slug' => $information_title_slug,
											'description' => $description);
			if ($this->Information_model->insertInformation($inputArray)) {
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		if ($this->Information_model->blogCount()) {
			$data->add = 0;
		}else{
			$data->add = 1;
		}
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/information_add',$data);
		$this->load->view('Admin/footer');
	}
	public function informationStatusUpdate($Id,$newInfo){
		if($this->Information_model->informationStatusUpdate($Id,$newInfo)){
			redirect(admin_url('Information'));
		}else{
			redirect(admin_url('Information'));
		}
	}
	public function deleteInformation($Id){
		if($this->Information_model->deleteInformation($Id)){
			redirect(admin_url('Information'));
		}else{
			redirect(admin_url('Information'));
		}
	}
	public function InformationSort(){
		$sort = $this->input->post('sort',true);
		$this->Information_model->InformationSort($sort);
		redirect(admin_url('Information'));
	}
	public function updateInformation($Id){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Information';
		$header_data->subMenu 	= 'InformationList';
		$data->CacheQuestion 	= $this->Information_model->getQuery($Id);
		if ($this->input->post()) {
			if (empty($this->session->flashdata('Image'))) {
				$information_image = $data->CacheQuestion->information_image;
			} else {
				$information_image = $this->session->flashdata('Image');
			}
			$information_title 		= $this->input->post('information_title',true);
			$description 			= $this->input->post('description',true);
			$information_title_slug = url_seo($information_title);
			$information_content 	= $this->input->post('information_content',true);
			$inputArray 			= array('information_title' => $information_title,
											'information_content' => $information_content,
											'information_image' => $information_image,
											'information_title_slug' => $information_title_slug,
											'description' => $description);
			if ($this->Information_model->updateInformation($Id,$inputArray)) {
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		$data->Information = $this->Information_model->getQuery($Id);
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/information_edit',$data);
		$this->load->view('Admin/footer');
	}
	public function ImageUpload(){	
		$sonuc = $this->Information_model->ImageUpload();
		if ($sonuc != false){
			$this->session->set_flashdata('Image', $sonuc);
		}
	}
}
?>