<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Contact extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Contact_model');
		}
		public function index(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Contact';
			$header_data->subMenu	= 'ContactList';
			$data->contact 			= $this->Contact_model->getContact();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/contact',$data);
			$this->load->view('Admin/footer');
		}
		public function delete($Id){
			if($this->Contact_model->delete($Id)){
				redirect(admin_url('Contact'));
			}else{
				redirect(admin_url('Contact'));
			}
		}
		public function bulletin(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Contact';
			$header_data->subMenu	= 'BulletinList';
			$data->bulletin 		= $this->Contact_model->bulletin();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/bulletin',$data);
			$this->load->view('Admin/footer');
		}
		public function deleteBulletin($Id){
			if($this->Contact_model->deleteBulletin($Id)){
				redirect(admin_url('Contact/bulletin'));
			}else{
				redirect(admin_url('Contact/bulletin'));
			}
		}

		public function date(){
			$data 			= new StdClass;
			$data->mainMenu = 'Contact';
			$data->subMenu	= 'DateList';
			$data->dateInfo 		= $this->Contact_model->getDate();
            
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/date_list');
			$this->load->view('Admin/footer');
		}

		public function deleteDate($Id){
			if($this->Contact_model->deleteDate($Id)){
				redirect(admin_url('Contact/date'));
			}else{
				redirect(admin_url('Contact/date'));
			}
		}

		public function deleteOffer($Id){
			if($this->Contact_model->deleteOffer($Id)){
				redirect(admin_url('Contact/date_offer'));
			}else{
				redirect(admin_url('Contact/date_offer'));
			}
		}

		public function date_offer(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Contact';
			$header_data->subMenu	= 'OfferList';
			$data->dateInfo 		= $this->Contact_model->getDateOffer();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/offer_list',$data);
			$this->load->view('Admin/footer');
		}
	}
?>