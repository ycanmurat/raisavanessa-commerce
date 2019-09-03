<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
/**
 * 
 */
class Category extends Kodakil_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Category_model','model');
    }

    public function index()
    {
        $data           = new StdClass;
        $data->mainMenu = 'Category';
        $data->subMenu  = 'CategoryList';
        $data->id = 0;
        $data->categories = $this->model->getCategories();
        
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/category');
        $this->load->view('Admin/footer');
    }

    public function add($id = 0)
    {
        $data           = new StdClass;
        $data->mainMenu = 'Category';
        $data->subMenu  = 'CategoryAdd';
        if ($id != 0) {
            $data->id = $id;
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Kategori Adı', 'required|trim');
            $this->form_validation->set_rules('description', 'Kısa Açıklama', 'required|trim|max_length[160]');
            if ($this->form_validation->run() != FALSE){
                $postData = $this->getAllPosts();
                $postData->default_image = $this->session->flashdata('galeryImage') ?? '';
                if ($this->model->addCategory($postData)) {
                    $this->session->set_flashdata('okey',1);
                    $this->agent->referrer();
                }else{
                    $this->session->set_flashdata('hata',1);
                    redirect(site_url('Admin/Category/add'));
                }
            }
        }

        $data->categories = $this->model->getMainCategories();
        
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/category_add');
        $this->load->view('Admin/footer');
    }

    public function Sub($id)
    {
        $data           = new StdClass;
        $data->mainMenu = 'Category';
        $data->subMenu  = 'CategoryList';
        $data->id = $id;

        $data->categories = $this->model->getSubCategories($id);
        
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/category');
        $this->load->view('Admin/footer');
    }

    public function groupAdd()
    {
        $data = $this->getAllPosts();
        $this->model->addGroup($data);
        redirect($this->agent->referrer());
    }

    public function group()
    {
        $data           = new StdClass;
        $data->mainMenu = 'Category';
        $data->subMenu  = 'CategoryGroup';

        $data->categories = $this->model->getCategorieGroups();
        $data->mainCategories = $this->model->getMainCategories();
        
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/category_group');
        $this->load->view('Admin/footer');
    }

    public function status($id,$st)
    {
        $this->model->updateStatus($id,$st);
        redirect($this->agent->referrer());
    }

    public function delete($id)
    {
        $this->model->deleteCategory($id);
        redirect($this->agent->referrer());
    }

    public function groupStatus($id,$st)
    {
        $this->model->groupStatus($id,$st);
        redirect($this->agent->referrer());
    }

    public function groupDelete($id)
    {
        $this->model->groupDelete($id);
        redirect($this->agent->referrer());
    }

    public function groupUpdate($id)
    {
        $this->model->groupUpdate($this->getAllPosts(),$id);
        redirect($this->agent->referrer());
    }

    public function groupAddUpdate($id)
    {
        $data = $this->input->post('categories',true);
        $dt = array();
        foreach ($data as $key => $val) {
            $dt[] = array('category_id' => $val, 'group_id' => $id);
        }
        $this->model->groupAddUpdate($id,$dt);
        redirect($this->agent->referrer());
    }


    public function edit($id)
    {
        $data           = new StdClass;
        $data->mainMenu = 'Category';
        $data->subMenu  = 'CategoryList';

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Kategori Adı', 'required|trim');
            $this->form_validation->set_rules('description', 'Kısa Açıklama', 'required|trim|max_length[160]');
            if ($this->form_validation->run() != FALSE){
                $postData = $this->getAllPosts();

                $default_image = $this->session->flashdata('galeryImage') ?? '';
                if ($default_image != '') {
                    $postData->default_image = $default_image;
                }
                if ($this->model->editCategory($postData,$id)) {
                    $this->session->set_flashdata('okey',1);
                    redirect(site_url('Admin/Category/edit/'.$id));
                }else{
                    $this->session->set_flashdata('hata',1);
                    redirect(site_url('Admin/Category/edit/'.$id));
                }
            }
        }
        
        $data->categories = $this->model->getMainCategories();
        $data->category = $this->model->getCategoryById($id);
        if ($data->category == false) {
            redirect(site_url('Admin/Category'));
        }
        
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/category_edit');
        $this->load->view('Admin/footer');
    }

    public function imageAdd()
    {
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'bmp|gif|jpeg|jpg|jpe|jp2|png|tiff|tif';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $this->output->set_status_header('404'); 
                echo $this->upload->display_errors();
                return false;
            } else {
                $rt =  $this->upload->data();
                $name = 'assets/uploads/'.$rt['file_name'];
                $this->session->set_userdata('category_image',$name);
            }
        }else{
            $this->output->set_status_header('404'); 
            echo 'Resim Seçilemedi';
            return false;
        }
    }
}
?>