<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class User extends Kodakil_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Admin/User_model','UM');
        $this->checkLogin();
    }

    public function index(){
        $metaData                   = new StdClass;
        $data                       = new StdClass;
        $data->MetaValue            = new StdClass;
        $data->mainMenu             = 'User';
        $data->subMenu              = 'UserList';
        $data->users                = $this->UM->getAllUsers();


        $this->load->view('Admin/header',$data);
        $this->load->view('Admin/user');
        $this->load->view('Admin/footer');
    }

    public function ChangeStatus($id,$st)
    {
        if ($st == 0) {
            $bayi = 1;
        }else{
            $bayi = 0;
        }

        $this->UM->ChangeStatus($id,$bayi);
        redirect($this->agent->referrer());
    }

    public function delete($id)
    {
        $this->UM->delete($id);
        redirect($this->agent->referrer());
    }
} 
?>