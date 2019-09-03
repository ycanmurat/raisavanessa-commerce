<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Faq extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin/Faq_model');
		$this->checkLogin();
	}

	public function index(){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Faq';
		$header_data->subMenu 	= 'FaqList';
		$data->getFaq 			= $this->Faq_model->getFaq();
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/faq',$data);
		$this->load->view('Admin/footer');
	}
	public function add(){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Faq';
		$header_data->subMenu 	= 'FaqAdd';
		if ($this->input->post()) {
			$title 		= $this->input->post('title',true);
			$content 	= $this->input->post('content',true);
			$inputArray = array('title'=>$title,'content'=>$content);
			if ($this->Faq_model->insertQuestion($inputArray)) {
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/faq_add',$data);
		$this->load->view('Admin/footer');
	}
	public function faqStatusUpdate($Id,$newInfo){
		if($this->Faq_model->faqStatusUpdate($Id,$newInfo)){
			redirect(admin_url('Faq'));
		}else{
			redirect(admin_url('Faq'));
		}
	}
	public function deleteFaq($Id){
		if($this->Faq_model->deleteFaq($Id)){
			redirect(admin_url('Faq'));
		}else{
			redirect(admin_url('Faq'));
		}
	}
	public function faqSort(){
		$sort = $this->input->post('sort',true);
		$this->Faq_model->SetSort($sort);
		redirect(admin_url('Faq'));
	}
	public function updateFaq($Id){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Faq';
		$header_data->subMenu 	= 'FaqList';
		if ($this->input->post()) {
			$title 		= $this->input->post('title',true);
			$content 	= $this->input->post('content',true);
			$inputArray = array('title'=>$title,'content'=>$content);
			if ($this->Faq_model->updateQuestion($Id,$inputArray)) {
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		$data->Question = $this->Faq_model->getQuery($Id);
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/faq_edit',$data);
		$this->load->view('Admin/footer');
	}
}
?>