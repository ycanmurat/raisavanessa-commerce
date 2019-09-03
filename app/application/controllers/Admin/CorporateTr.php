<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class CorporateTr extends Kodakil_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('Admin/CorporateTr_model','Corporate_model');
    }

    public function index($page = 0)
    {
        $data           = new StdClass;
        $data->mainMenu     = 'CorporateTr';
        $data->subMenu      = 'CorporateTrUpdate'.$page;
        $data->page = $page;
        if (!empty($this->session->flashdata('Image'))) {
            $postInfo = new StdClass;
            $postInfo->image = $this->session->flashdata('Image');
            if ($this->Corporate_model->updateCorporate($postInfo,0,$page)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }


        $data->info    = $this->Corporate_model->getCorporateBanner($page);
        $data->list    = $this->Corporate_model->getCorporateContents($page);
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/corporate_tr');
        $this->load->view('Admin/footer');  
    }

    public function add($page)
    {
        if ($this->input->post()) {
            $postInfo = $this->GetAllPosts();
            if (empty($this->session->flashdata('Image'))) {
                $postInfo->image = $data->corporateInfo->image;
            }else{
                $postInfo->image = $this->session->flashdata('Image');
            }
            if ($this->Corporate_model->insertCorporate($postInfo,1,$page)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }
        redirect($this->agent->referrer());
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
            if (!empty($this->session->flashdata('Image'))) {
                $postInfo->image = $this->session->flashdata('Image');
            }
            if ($this->Corporate_model->insertCorporateById($postInfo,$id)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }


        $data->rt    = $this->Corporate_model->getCorporateContentById($id);
        $data->mainMenu     = 'CorporateTr';
        $data->subMenu      = 'CorporateTrUpdate'.$data->rt->page;
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/corporate_edit_tr');
        $this->load->view('Admin/footer');  
    }

    public function collections()
    {
        $data           = new StdClass;
        $data->mainMenu     = 'CorporateTr';
        $data->subMenu      = 'collectionsTr';
        $data->page = 2;
       
        if (!empty($this->session->flashdata('Image'))) {
            $postInfo = $this->GetAllPosts();
            $postInfo->image = $this->session->flashdata('Image');
            
            if ($this->Corporate_model->insertCorporate($postInfo,0,$data->page)) {
                $this->session->set_flashdata('onay',1);
            }else{
                $this->session->set_flashdata('hata',1);
            }
        }


        $data->list    = $this->Corporate_model->getCollections();

        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/corporate_collection_tr');
        $this->load->view('Admin/footer');  
    }

    public function ImageUpload(){  
        $result = $this->Corporate_model->ImageUpload();
        if ($result != false){
            $this->session->set_flashdata('Image', $result);
        }
    }

    public function rendezvous()
    {
        $data           = new StdClass;
        $data->mainMenu     = 'CorporateTr';
        $data->subMenu      = 'rendezvousTr';
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
        $this->load->view('Admin/rendezvous_list_tr');
        $this->load->view('Admin/footer');  
    }



    public function about()
    {
        $data           = new StdClass;
        $data->mainMenu     = 'CorporateTr';
        $data->subMenu      = 'AboutTr';
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
}
?>