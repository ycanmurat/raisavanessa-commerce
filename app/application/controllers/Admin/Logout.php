<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Logout extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
		}
		public function index(){
            $this->session->unset_userdata('admin_info');
			$this->session->unset_userdata('admin_user');
			redirect(admin_url('Login'));
		}
	}
?>