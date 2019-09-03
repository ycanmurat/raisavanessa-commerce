<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Language extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin/Language_model');
		$this->checkLogin();
	}

	public function index(){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Language';
		$header_data->subMenu 	= 'LanguageList';
		$data->languages_list = $this->Language_model->languages_list();
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/languages',$data);
		$this->load->view('Admin/footer');
	}

	public function Add(){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Language';
		$header_data->subMenu 	= 'LanguageAdd';

		if($this->input->post()){
			$short_code = $this->input->post('short_code',true);
			$lang_name  = $this->input->post('lang_name', true);
			$lang 		= array('short_code' => $short_code, 'lang_name' => $lang_name);
			if($this->Language_model->addLanguage($lang)){
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}

		}

		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/languages_add',$data);
		$this->load->view('Admin/footer');
	}

	public function UpdateLanguage($Id,$st){
		if($this->Language_model->UpdateLanguage($Id,$st)){
			redirect(admin_url('Language'));
		}else{
			redirect(admin_url());
		}
	}

	public function editLanguage($Id){
		$header_data 			= new StdClass;
		$data 		 			= new StdClass;
		$header_data->mainMenu 	= 'Language';
		$header_data->subMenu 	= 'LanguageList';
		if($this->input->post()){
			$short_code	= $this->input->post('short_code',true);
			$lang_name 	= $this->input->post('lang_name',true);
			$infoLang 	= array('short_code' => $short_code, 'lang_name' => $lang_name);
			if($this->Language_model->languageNewEdit($Id,$infoLang)){
				$this->session->set_flashdata('onay','1');
			}else{
				$this->session->set_flashdata('hata','1');
			}
		}
		$data->lang_info = $this->Language_model->infoLanguage($Id);
		if($data->lang_info == false){
			redirect(admin_url('Language'));
		}
		$this->load->view('Admin/header',$header_data);
		$this->load->view('Admin/languages_edit',$data);
		$this->load->view('Admin/footer');
	}

	public function deleteLanguage($Id){
		if($this->Language_model->deleteLanguage($Id)){
			redirect(admin_url('Language'));
		}else{
			redirect(admin_url());
		}

	}

	public function statics($id = 0)
	{
		$data = new StdClass;
		$data->mainMenu 	= 'Language';
		$data->subMenu 	= 'LanguageList';
		$data->lang_id = $id;
		$data->statics = $this->Language_model->getStatics($id);
		if ($data->statics == false) {
			redirect(admin_url('Language'));
		}

		$data->statics = json_decode($data->statics);

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/languages_statics');
		$this->load->view('Admin/footer');

	}

	public function StaticsAdd($id)
	{
		$data = $this->input->post('Lang',True);
		$data = json_encode((object)$data);
		//prex($data);

		$this->Language_model->JsoneSave($id,$data);

		$fname = 'lang/'.$id.'.json';
		$file = fopen($fname,"w");
		fwrite($file, $data);

		redirect(admin_url('Language/statics/'.$id));
	}

	public function deneme()
	{
		$json = '{"footerUzunBilgi":"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam aliquid saepe voluptates natus esse ratione ducimus odio, minima numquam dicta nihil distinctio, velit libero obcaecati illum possimus labore adipisci atque.adipisci atque","footerFacebook":"www.facebook.com","footerTwitter":"www.twitter.com","footerInstagram":"www.instagram.com","footerPinterest":"www.pinterest.com","footerAdres":"Rasathane Mh. 3070 Sk. No:36-38 ATAKUM/SAMSUN","footerMail","info@tugadizayn.com","footerNumara":"0555 000 00 00","iletisimAciklama":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sit, beatae vitae unde nemo obcaecati quod eum adipisci, deserunt odio error nam totam, in delectus. Voluptatibus doloremque earum dolore"}
			';
			var_dump(json_encode($json));
	}
}
?>