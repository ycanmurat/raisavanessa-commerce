<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Support_request extends Kodakil_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('Admin/Support_request_model','model');
    }

    public function index()
    {
        $data                  = new stdClass;
        $header_data           = new stdClass;
        $header_data->mainMenu = 'Support_request';
        $header_data->subMenu  = '';
        $data->support_request = $this->model->get_support_requests();
        $this->load->view('Admin/header', $header_data);
        $this->load->view('Admin/support_request', $data);
        $this->load->view('Admin/footer');
    }

    public function delete($id = '') 
    {
    	if ($this->model->delete($id)) {
    		redirect(admin_url('Support_request'));
    	} else {
    		redirect(admin_url('Support_request'));
    	}
    }

    public function inspecting($id = '') 
    {
    	if ($this->model->inspecting($id)) {
    		redirect(admin_url('Support_request'));
    	} else {
    		redirect(admin_url('Support_request'));
    	}
    }

    public function resolved($id = '') 
    {
    	if ($this->model->resolved($id)) {
    		redirect(admin_url('Support_request'));
    	} else {
    		redirect(admin_url('Support_request'));
    	}
    }
}
