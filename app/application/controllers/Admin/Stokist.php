<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Stokist extends Kodakil_Controller
{
	function __construct()
    {
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Stokist_model');
	}

	public function index($lang = 0)
    {
		$data 			= new StdClass;
		$data->mainMenu 	= 'Stokist';
		$data->subMenu  	= 'Stokist';
		if ($this->input->post()) {
            $postData = $this->GetAllPosts();
			if ($this->Stokist_model->insert($postData)) {
				$this->session->set_flashdata('onay',1);
			}else{
				$this->session->set_flashdata('hata',1);
			}
		}


		$data->list    = $this->Stokist_model->get();
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/stokist');
		$this->load->view('Admin/footer');	
	}

    public function delete($id)
    {
        $this->Stokist_model->delete($id);
        redirect($this->agent->referrer());
    }
}