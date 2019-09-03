<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Login extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Admin/Login_model');
		if($this->session->userdata('admin_user') == 1){
			redirect(admin_url('Home'));
		}
	}

	public function index(){
		$data 			= new StdClass;
		if ($this->input->post()){
			$username 	= $this->input->post('username',true);
			$password 	= md5($this->input->post('password',true));
			if($this->Login_model->userIncoming($username,$password)){
				$this->session->set_userdata('admin_user','1');
				redirect(admin_url('Home'));
			}else{
				$this->session->set_flashdata('giris_hatasi','1');
				redirect(site_url('Admin/login'));
			}
		}
		$this->load->view('Admin/login');
	}
}
?>