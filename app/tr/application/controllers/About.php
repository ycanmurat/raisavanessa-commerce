<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class About extends Kodakil_Controller
{
    function __construct(){
        parent::__construct();
        $this->curValid();
    }
    
    public function index()
    {
        $data               = $this->Constract_model->getAllData();
        $data->about = $this->Constract_model->getAbout();
        // prex($data->about);
        $this->load->view('header',$data);
        $this->load->view('about');
        $this->load->view('footer');
    }

    public function press()
    {
        $data       = $this->Constract_model->getAllData();
        $data->news = $this->Constract_model->getNews();
        //prex($data->news);

        $this->load->view('header',$data);
        $this->load->view('press');
        $this->load->view('footer');
    }
}
?>