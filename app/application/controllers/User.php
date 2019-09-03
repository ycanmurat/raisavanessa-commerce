<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class User extends Kodakil_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model','model');
        $this->curValid();
	}
	
	public function login()
	{
        //prex($this->session->userdata());
        $data              = $this->Constract_model->getAllData();
        
        if (!empty($this->session->userdata('user'))) {
            redirect(site_url());
        }
        
        $this->load->view('header', $data);
        $this->load->view('login');
        $this->load->view('footer');
	}

    public function register()
    {
        $data              = $this->Constract_model->getAllData();

        $this->load->view('header', $data);
        $this->load->view('sign-up');
        $this->load->view('footer');
    }

    public function forget()
    {
        $data              = $this->Constract_model->getAllData();

        $this->load->view('header', $data);
        $this->load->view('forgot-password');
        $this->load->view('footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(site_url());
    }
}
?>