<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Instagram extends Kodakil_Controller
{
    function __construct(){
        parent::__construct();
        $this->curValid();
    }
    
    public function index()
    {
        $data               = $this->Constract_model->getAllData();
        $data->instagram = $this->Constract_model->getAbout();
        // prex($data->about);
        $this->load->view('header',$data);
        $this->load->view('instagram');
        $this->load->view('footer');
    }
}
?>