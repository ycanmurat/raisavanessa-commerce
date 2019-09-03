<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Corporate extends Kodakil_Controller
{
	function __construct()
    {
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Corporate_model');
	}

	public function index($lang = 0)
    {
		$data 			= new StdClass;
		$data->mainMenu 	= 'Corporate';
		$data->subMenu  	= 'CorporateUpdate'.$lang;
        $data->lang = $lang;
		if ($this->input->post()) {
            $postInfo = $this->GetAllPosts();
            $postInfo->image = $this->session->userdata('Image');
            $postInfo->image2 = $this->session->userdata('Image2');
            $postInfo->image3 = $this->session->userdata('Image3');
            $this->session->unset_userdata('Image');
            $this->session->unset_userdata('Image2');
            $this->session->unset_userdata('Image3');
            $postInfo->lang = $lang; 

			if ($this->Corporate_model->insertCorporate($postInfo)) {
				$this->session->set_flashdata('onay',1);
			}else{
				$this->session->set_flashdata('hata',1);
			}
		}


		$data->list    = $this->Corporate_model->getCorporateContents($lang);
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/corporate');
		$this->load->view('Admin/footer');	
	}

    public function delete($id)
    {
        $this->Corporate_model->delete($id);
        redirect($this->agent->referrer());
    }

    public function edit($id)
    {
        $data           = new StdClass;
       
        if ($this->input->post()) {
            $postInfo = $this->GetAllPosts();
            if (!empty($this->session->userdata('Image'))) {
                $postInfo->image = $this->session->userdata('Image');
                $this->session->unset_userdata('Image');
            }

            if (!empty($this->session->userdata('Image2'))) {
                $postInfo->image2 = $this->session->userdata('Image2');
                $this->session->unset_userdata('Image2');
            }

            if (!empty($this->session->userdata('Image3'))) {
                $postInfo->image3 = $this->session->userdata('Image3');
                $this->session->unset_userdata('Image3');
            }
            if ($this->Corporate_model->insertCorporateById($postInfo,$id)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }


        $data->rt    = $this->Corporate_model->getCorporateContentById($id);
        $data->mainMenu     = 'Corporate';
        if ($id == 39) {
            $data->rt->lang = 3;
        }
        $data->subMenu      = 'CorporateUpdate'.$data->rt->lang;
        $this->load->view('Admin/header',$data);
        if ($id == 39) {
            $this->load->view('Admin/corporate_edit_2');
        }else{
            $this->load->view('Admin/corporate_edit');
        }
        $this->load->view('Admin/footer');  
    }

    public function collections()
    {
        $data           = new StdClass;
        $data->mainMenu     = 'Corporate';
        $data->subMenu      = 'collections';
        $data->page = 2;
       
        if (!empty($this->session->flashdata('Image'))) {
            $postInfo = $this->GetAllPosts();
            $postInfo->image = $this->session->flashdata('Image');
            $postInfo->image = $this->session->flashdata('Image');
            
            if ($this->Corporate_model->insertCorporate($postInfo,0,$data->page)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }


        $data->list    = $this->Corporate_model->getCollections();

        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/corporate_collection');
        $this->load->view('Admin/footer');  
    }

    public function ImageUpload(){  
        $result = $this->Corporate_model->ImageUpload();
        if ($result != false){
            $this->session->set_userdata('Image', $result);
        }
    }

    public function ImageUpload2(){  
        $result = $this->Corporate_model->ImageUpload();
        if ($result != false){
            $this->session->set_userdata('Image2', $result);
        }
    }

    public function ImageUpload3(){  
        $result = $this->Corporate_model->ImageUpload();
        if ($result != false){
            $this->session->set_userdata('Image3', $result);
        }
    }

    public function rendezvous()
    {
        $data           = new StdClass;
        $data->mainMenu     = 'Corporate';
        $data->subMenu      = 'rendezvous';
        $page = 3;
        $data->page = $page;

        if ($this->input->post('content')) {
            $postInfo = new StdClass;
            if (!empty($this->session->flashdata('Image'))) {
                $postInfo->image = $this->session->flashdata('Image');
            }
            $postInfo->content = $this->input->post('content',true);
            if ($this->Corporate_model->updateCorporate($postInfo,0,$page)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }

        $data->info    = $this->Corporate_model->getCorporateBanner($page);
        //prex($data->info);

        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/rendezvous_list');
        $this->load->view('Admin/footer');  
    }


    public function about()
    {
        $data           = new StdClass;
        $data->mainMenu     = 'Corporate';
        $data->subMenu      = 'About';
        $page = 4;
        $data->page = $page;

        if ($this->input->post('content')) {
            $postInfo = new StdClass;
            if (!empty($this->session->flashdata('Image'))) {
                $postInfo->image = $this->session->flashdata('Image');
            }
            $postInfo->content = $this->input->post('content',true);
            if ($this->Corporate_model->updateCorporate($postInfo,0,$page)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }

        $data->info    = $this->Corporate_model->getCorporateBanner($page);
        //prex($data->info);

        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/rendezvous_list');
        $this->load->view('Admin/footer');  
    }

    public function delImage($id,$type)
    {
        $this->Corporate_model->delImage($id,$type);
        redirect($this->agent->referrer());
    }
}
?>