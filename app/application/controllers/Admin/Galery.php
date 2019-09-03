<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Galery extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Galery_model');
		}

		public function index(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'CategoryGaleryList';
			$data->imageInfo 		= $this->Galery_model->imageInfo();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/galery',$data);
			$this->load->view('Admin/footer');
		}

		public function Add($id){
			$data 			= new stdClass;
			$data->mainMenu = 'Galery';
			$data->subMenu 	= 'GaleryAdd';
			$data->category_id 	= $id;

			if($this->input->post()){
				$postData 		= $this->getAllPosts();
				$postData->image_url = $this->session->flashdata('galeryImage');
				if($this->Galery_model->addImage($postData)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Galery/add/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Galery/add/'.$id));
				}
			}
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/galery_add');
			$this->load->view('Admin/footer');	
		}

		public function sub($id)
		{
			
			$data 					= new stdClass;
			$data->mainMenu 	= 'Galery';
			$data->subMenu 		= 'CategoryGaleryList';
			$data->imageInfo 		= $this->Galery_model->imageInfo($id);
			$data->id 	= $id;
			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/galery');
			$this->load->view('Admin/footer');
		}

		public function ImageUpload(){	
		$sonuc = $this->Galery_model->GaleryImageUpload();
			if ($sonuc != false){
				$this->session->set_flashdata('galeryImage', $sonuc);
			}
		}

		public function categoryAdd(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'CategoryGaleryAdd';
			if($this->input->post()){
				$postData = $this->getAllPosts();
				$postData->image = $this->session->flashdata('galeryImage');
				$postData->slug = url_seo($postData->category_title);
				$postData->slug_tr = url_seo($postData->category_title_tr);
				if (isset($postData->menu)) {
					$postData->menu = 1;
				}
				if (isset($postData->page)) {
					$postData->page = 1;
				}
				if (isset($postData->form)) {
					$postData->form = 1;
				}

				if($this->Galery_model->addCategory($postData)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Galery/categoryAdd'));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Galery/categoryAdd'));
				}
			}
			$data->categories = $this->Galery_model->getMainCategories();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/galery_category_add',$data);
			$this->load->view('Admin/footer');
		}
		public function category(){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'CategoryGaleryList';
			$data->categoryInfo 	= $this->Galery_model->getCategory();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/galery_category',$data);
			$this->load->view('Admin/footer');
		}
		public function deleteCategory($Id){
			if($this->Galery_model->deleteCategory($Id)){
				redirect(admin_url('Galery/category'));
			}else{
				redirect(admin_url('Galery/category'));
			}
		}
		public function editStatus($Id,$st){
			if($this->Galery_model->editStatus($Id,$st)){
				redirect(admin_url('Galery/category'));
			}else{
				redirect(admin_url('Galery/category'));
			}
		}
		public function editCategory($Id){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'CategoryGaleryList';
			if($this->input->post()){
				$postData = $this->getAllPosts();

				$image = $this->session->flashdata('galeryImage') ?? '';
				if ($image != '') {
					$postData->image = $image;
				}

				$postData->slug = url_seo($postData->category_title);
				$postData->slug_tr = url_seo($postData->category_title_tr);
				if (isset($postData->menu)) {
					$postData->menu = 1;
				}else{
					$postData->menu = 0;
				}
				if (isset($postData->page)) {
					$postData->page = 1;
				}else{
					$postData->page = 0;
				}
				if (isset($postData->form)) {
					$postData->form = 1;
				}else{
					$postData->form = 0;
				}
				if($this->Galery_model->updateCategory($Id,$postData)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Galery/editCategory/'.$Id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Galery/editCategory/'.$Id));
				}
			}
			$data->categories = $this->Galery_model->getMainCategories();
			$data->info	= $this->Galery_model->categoryInfo($Id);
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/galery_category_edit',$data);
			$this->load->view('Admin/footer');
		}
		public function GaleryEditStatus($id,$st){
			if($this->Galery_model->GaleryEditStatus($id,$st)){
				redirect($this->agent->referrer());
			}else{
				redirect($this->agent->referrer());
			}
		}
		public function deleteGalery($id){
			$info = $this->Galery_model->delete($id);
			unlink($info->image_url);
			if($this->Galery_model->deleteGalery($info->id)){
				redirect($this->agent->referrer());
			}else{
				redirect($this->agent->referrer());
			}
		}
		public function editGalery($id){
			$data 					= new stdClass;
			$header_data 			= new stdClass;
			$header_data->mainMenu 	= 'Galery';
			$header_data->subMenu 	= 'GaleryList';
			$data->imageInfo = $this->Galery_model->getImage($id);
			$data->category_list 	= $this->Galery_model->getCategoryList();
			if($this->input->post()){
				$postData = $this->getAllPosts();
				if (empty($this->session->flashdata('galeryImage'))) {
					$postData->image_url = $data->imageInfo->image_url;
				} else {
					$postData->image_url = $this->session->flashdata('galeryImage');
				}
				if($this->Galery_model->updateGalery($postData,$id)){
					$this->session->set_flashdata('onay','1');
					redirect(admin_url('Galery/editGalery/'.$id));
				}else{
					$this->session->set_flashdata('hata','1');
					redirect(admin_url('Galery/editGalery/'.$id));
				}
			}
			$data->imageInfo = $this->Galery_model->getImage($id);
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/galery_edit',$data);
			$this->load->view('Admin/footer');
		}

		public function imageSort()
		{
			$sort = $this->input->post('sort',true);
			$this->Galery_model->SetSort($sort);
			redirect($this->agent->referrer());
		}
	}
?>