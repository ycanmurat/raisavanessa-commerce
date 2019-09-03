<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class News extends Kodakil_Controller{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/News_model');
		}
		public function index(){
			$header_data = new StdClass;
			$data 		 = new StdClass;
			$header_data->mainMenu = 'News';
			$header_data->subMenu = 'NewsList';
			$data->NewsInfo = $this->News_model->NewsInfo();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/news',$data);
			$this->load->view('Admin/footer');
		}
		public function add(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'News';
			$header_data->subMenu 	= 'NewsAdd';
			$data->menu_list 		= $this->News_model->menu_list();
			if($this->input->post()){
				$meta 				= $this->input->post('meta',true);
				$description 		= $this->input->post('description',true);
				$title 				= $this->input->post('title',true);
				$content			= $this->input->post('content',true);
				$menu_id			= $this->input->post('menu_id',true);
				$picture 			= $this->session->flashdata('NewsImage');
				if($this->News_model->NewsAdd($meta,$description,$title,$content,$menu_id,$picture)){
					$this->session->set_flashdata('onay','1');
				}else{
					$this->session->set_flashdata('hata','1');
				}
			}
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/news_add',$data);
			$this->load->view('Admin/footer');

		}
		public function ImageUpload(){	
			$NewsUpload = $this->News_model->NewsImageUpload();
				if ($NewsUpload != false){
					$this->session->set_flashdata('NewsImage', $NewsUpload);
				}
		}
		public function deleteNews($Id){
			if($this->News_model->deleteNews($Id)){
				redirect(admin_url('News'));
			}
		}
		public function editNews($Id){
			$header_data 			= new StdClass;
			$data 		 			= new StdClass;
			$header_data->mainMenu 	= 'News';
			$header_data->subMenu 	= 'NewsList';
			$data->menu_list 		= $this->News_model->menu_list();
			if($this->input->post()){
				$meta 				= $this->input->post('meta',true);
				$description 		= $this->input->post('description',true);
				$title 				= $this->input->post('title',true);
				$content 			= $this->input->post('content',true);
				$menu_id 			= $this->input->post('menu_id',true);
				$picture 			= $this->session->flashdata('NewsImage');
				if($this->News_model->updateNews($meta,$description,$title,$content,$menu_id,$picture,$Id)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('News/editNews/'.$Id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('News/editNews/'.$Id));
				}
			}
			$data->getNewsInfo = $this->News_model->editNews($Id);
			if($data->getNewsInfo == true){
				$this->load->view('Admin/header',$header_data);
				$this->load->view('Admin/news_edit',$data);
				$this->load->view('Admin/footer');
			}else{
				redirect(admin_url('News'));
			}
		}
		public function editStatus($Id,$new_info){
			if ($this->News_model->editStatus($Id,$new_info)) {
				redirect(admin_url('News'));
			}else{
				redirect(admin_url('News'));
			}
		}
	}
?>