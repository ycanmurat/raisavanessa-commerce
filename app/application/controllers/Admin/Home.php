<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Home extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Home_model');
		}
		public function index(){
			$data 					= new StdClass;
			$data->mainMenu 	= "Home";
			$data->subMenu  	= "home";

			//Sayı Bilgileri	
			$data->sliderCount 		= $this->Home_model->sliderCount();
			$data->newsCount 		= 0;
			$data->staticsCount 	= $this->Home_model->staticsCount();
			$data->languagesCount 	= $this->Home_model->languagesCount();
			$data->categoryCount 	= $this->Home_model->categoryCount();
			$data->productCount 	= $this->Home_model->productCount();
			$data->pcategoryCount 	= 0;
			$data->photoCount		= 0;
			//Sayı Bilgileri
			//İçerik Bilgileri
			$data->newsInfo			= array();
			//İçerik Bilgileri

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/home');
			$this->load->view('Admin/footer');
		}

        public function m404()
        {
            $data                   = new StdClass;
            $data->mainMenu     = "Home";
            $data->subMenu      = "home";
            pre('Sayfa Bulunamadı');
            $this->load->view('Admin/header',$data);
            $this->load->view('Admin/footer');
        }

        public function adminEdit()
        {
            $data                   = new StdClass;
            $data->mainMenu     = "Admin";
            $data->subMenu      = "edit";


            if ($this->input->post()) {
                $postData = $this->getAllPosts();
                $this->Home_model->addAdminUser($postData);
            }

            $data->admins = $this->Home_model->getAdmins();
            $this->load->view('Admin/header',$data);
            $this->load->view('Admin/adminEdit');
            $this->load->view('Admin/footer');
        }

        public function adminDelete($id)
        {
            $this->Home_model->removeAdmin($id);
            redirect($this->agent->referrer());
        }

        public function adminEditPass($id)
        {
            $this->Home_model->editAdminPass($id,$this->input->post('password',true));
            redirect($this->agent->referrer());
        }
	}
?>