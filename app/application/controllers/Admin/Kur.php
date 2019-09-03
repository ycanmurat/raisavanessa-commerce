<?php 
/**
* 
*/
class Kur extends Kodakil_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('Admin/Kur_model');
    }

    public function index()
    {
        $data = new StdClass;

        $data->mainMenu = 'Kur';
        $data->subMenu  = 'Kur';

        $data->kur = $this->Kur_model->getPrice();

        // prex($data->kur);

        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/kur');
        $this->load->view('Admin/footer');
    }

    public function update()
    {
        $data = $this->getAllPosts();
        $data = reverseArray($data);
        // prex($data);

        if ($this->Kur_model->update($data)) {
            $this->session->set_flashdata('okey',1);
        }else{
            $this->session->set_flashdata('hata',1);
        }

        redirect(site_url('Admin/kur'));
    }

    public function otoRefresh()
    {
        $this->Kur_model->refresh();
        redirect(site_url('Admin/kur'));
    }

    public function editStatus($id,$st)
    {
        if($this->Kur_model->editStatus($id,$st)){
            redirect(admin_url('kur'));
        }else{
            redirect(admin_url('Kur'));
        }
    }
}

?>