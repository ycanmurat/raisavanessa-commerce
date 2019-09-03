<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Contact extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Contact_model');
        $this->curValid();
	}
	
	public function index(){
		
		$data 				= $this->Constract_model->getAllData();
		
		$this->load->view('header',$data);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function sendContact()
	{
		
		$this->form_validation->set_rules('name', 'İsim & Soyisim', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|min_length[7]|max_length[250]|valid_email');
		$this->form_validation->set_rules('number', 'Telefon', 'required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('message', 'Mesaj', 'required|min_length[7]');
		if ($this->form_validation->run() == FALSE){
			print validation_errors('<div class="alert alert-danger errorLine" style="padding:5px">', '</div>');
		}else{
			$getAllPosts = $this->GetAllPosts();
			if ($this->Contact_model->writeMessage($getAllPosts)) {
				print "success";
			}else{
				print "error";
			}
		}
	}

	public function stockists()
	{
		$data 				= $this->Constract_model->getAllData();
		$data->list = $this->Contact_model->getStokists();
		// prex($data->list);
		$this->load->view('header',$data);
		$this->load->view('stockist');
		$this->load->view('footer');
	}


	public function costumer()
	{
		$data 				= $this->Constract_model->getAllData();
		$data->list = $this->Contact_model->getStokists();
		
		$this->load->view('header',$data);
		$this->load->view('customer-service');
		$this->load->view('footer');
	}

    public function rendezvous()
    {
        $data               = $this->Constract_model->getAllData();
        $data->info = $this->Contact_model->getRendezvous();
        
        $this->load->view('header',$data);
        $this->load->view('rendezvous');
        $this->load->view('footer');
    }

    public function teklif()
    {
        $data               = $this->Constract_model->getAllData();

        $data->result = 0;
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'İsim & Soyisim', 'required|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('email', 'E-Mail', 'required|min_length[7]|max_length[250]|valid_email');
            $this->form_validation->set_rules('phone', 'Telefon', 'required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('message', 'Mesaj', 'required|min_length[7]');
            if ($this->form_validation->run() != FALSE){
                $postData = $this->getAllPosts();
                $postData->file = $this->uploadImage($_FILES['file']);
                if ($this->Contact_model->addOffer($postData)) {
                    $data->result = 1;
                }else{
                    $data->result = 2;
                }
            }
        }
        
        $this->load->view('header',$data);
        $this->load->view('teklif');
        $this->load->view('footer');
    }

	public function newsLetter()
	{
		$this->form_validation->set_rules('newsLetterEmail', 'E-Mail', 'required|min_length[7]|max_length[250]|valid_email|is_unique[bulletin.newsLetterEmail]');
		if ($this->form_validation->run() == FALSE){
			print "error";
		}else{
			$getAllPosts = $this->GetAllPosts();
			if ($this->Contact_model->writenewsLetter($getAllPosts)) {
				print "success";
			}else{
				print "error";
			}
		}
	}
}
?>