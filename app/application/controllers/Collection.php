<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Collection extends Kodakil_Controller
{
    function __construct(){
        parent::__construct();
        $this->curValid();
    }
    
    public function index()
    {
        $data               = $this->Constract_model->getAllData();
        $data->list = $this->Constract_model->getCollectionPage();
        //prex($data->about);

        $this->load->view('header',$data);
        $this->load->view('collections');
        $this->load->view('footer');
    }

    public function detail($id)
    {
        $data       = $this->Constract_model->getAllData();
        $data->detail = $this->Constract_model->getCollectionDetail($id);
        // prex($data->detail);
        if ($data->detail == false) {
            $this->output->set_status_header('404');
            $this->load->view('header', $data);
            $this->load->view('404');
            $this->load->view('footer');
        }else{
            if (empty($data->detail->video)) {
                $this->load->view('header',$data);
                $this->load->view('collection-detail');
                $this->load->view('footer');
            }else{
                $this->load->view('header',$data);
                $this->load->view('collection-detail-video');
                $this->load->view('footer');
            }
        }

    }

    public function video($id)
    {
        $data       = $this->Constract_model->getAllData();
        $data->detail = $this->Constract_model->getCollectionDetail($id);
        // prex($data->detail);
        if ($data->detail == false) {
            $this->output->set_status_header('404');
            $this->load->view('header', $data);
            $this->load->view('404');
            $this->load->view('footer');
        }else{
            $this->load->view('header',$data);
            $this->load->view('collection-detail-video');
            $this->load->view('footer');
        }
    }
}
?>