<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
/**
 * 
 */
class About extends Kodakil_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/About_mdoel','model');
    }

    public function index()
    {
        $data           = new StdClass;
        $data->mainMenu = 'About';
        $data->subMenu = 'About';
        if ($this->input->post()) {
            $postData = $this->getAllPosts();
            $image = $this->session->flashdata('NewsImage') ?? '';
            if ($image != '') {
                $postData->image = $image;
            }
            $this->model->update($postData);
        }

        $data->about = $this->model->getAbout();
        
        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/about');
        $this->load->view('Admin/footer');
    }
}
?>