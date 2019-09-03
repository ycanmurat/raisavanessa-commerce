<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Basket extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Basket_model','BM');
        $this->load->model('Account_model', 'AM');
        $this->curValid();
	}
	
	public function index(){
		$data               = $this->Constract_model->getAllData();
        $data->cargo        = $this->BM->getCargo();

        // prex($this->cart->contents());

		$this->load->view('header',$data);
		$this->load->view('cart');
		$this->load->view('footer');
	}

    public function shopping()
    {
        $data               = $this->Constract_model->getAllData();
        $data->cargo        = $this->BM->getCargo();

        if ($data->user) {
            redirect(site_url('cart/address'));
        }

        $this->load->view('header',$data);
        $this->load->view('checkout');
        $this->load->view('footer');
    }

    public function address()
    {
        $data               = $this->Constract_model->getAllData();
        $data->country      = $this->AM->getCountrys();
        if ($this->session->userdata('user')) {
            $data->user         = $this->session->userdata('user');
            $data->adress       = $this->AM->getUserAdress($data->user->id);
        }

        // prex($data);
        $this->load->view('header',$data);
        $this->load->view('cart-address');
        $this->load->view('footer');
    }

    public function pay()
    {
        $data               = $this->Constract_model->getAllData();
        $data->order        = $this->BM->getTheOrder();
        // prex($data->order);
        if ($data->order == false) {
            redirect(site_url('cart'));
        }

        $this->load->view('header',$data);
        $this->load->view('payment');
        $this->load->view('footer');
    }

    public function iyzipay()
    {
        $data = new StdClass;
        $data->kur = $this->Constract_model->getKur();
        $data->creditCard = $this->getAllPosts();
        $parseDate = explode(" / ",$data->creditCard->expiry);
        $data->creditCard->mounth   = $parseDate[0];
        $data->creditCard->year     = $parseDate[1];

        $data->product  = $this->BM->getTheOrder();
        $this->load->library('iyzico');
        if ($data->creditCard->radioHire == 1 || $data->creditCard->radioHire == 'on') {
            $data->creditCard->radioHire = 1;
        }
        
        if (isset($data->creditCard->guvenliodeme)) {
            $q = $this->iyzico->Do3dPayment($data->creditCard,$data->product,$data->kur,$this->session->userdata('cur'));
            if ($q->status == 'success') {
                echo base64_decode($q->threeDSHtmlContent);
            }else{
                $this->session->set_userdata('cardError',$q);
                $this->BM->siparisBasarisiz();
                redirect(site_url('cart/error'));
            }
        }else{
            $q = $this->iyzico->DoPayment($data->creditCard,$data->product,$data->kur,$this->session->userdata('cur'));
            if ($q->status == 'failure') {
                $this->session->set_userdata('cardError',$q);
                $this->BM->siparisBasarisiz();
                //prex($q);
                redirect(site_url('cart/error'));
            }else{
                $this->BM->siparisBasarili();
                redirect(site_url('cart/success'));
            }
        }
    }

    public function success()
    {
        $data         = $this->Constract_model->getAllData();
        $data->detail = $this->session->userdata('orderDetail');

        $this->load->view('header',$data);
        $this->load->view('payment-result');
        $this->load->view('footer');
    }

    public function error()
    {
        $data           = $this->Constract_model->getAllData();
        $data->detail   = $this->session->userdata('orderDetail');
        $data->error    = $this->session->userdata('cardError');


        $this->load->view('header',$data);
        $this->load->view('payment-result');
        $this->load->view('footer');
    }

    public function result()
    {
        $data = new StdClass;
        $data = $this->getAllPosts();
        if ($data->conversationId > 0) {
            $this->BM->orderUserReInstall($data->conversationId);
            $this->session->set_userdata('order_id',$data->conversationId);
            $this->session->set_userdata('orderDetail',$this->BM->getTheOrder());
        }
        if ($data->status == 'failure') {
            $data = (object)array('errorMessage' => '3D Secure Failed','errorGroup'=> '3D Fail');
            $this->session->set_userdata('cardError',$data);
            redirect(site_url('cart/error'));
        }else{
            $this->load->library('iyzico');
            $q = $this->iyzico->Do3dLastPayment($data);
            if ($q->status == 'failure') {
                $this->session->set_userdata('cardError',$q);
                $this->BM->siparisBasarisiz();
                redirect(site_url('cart/error'));
            }else{
                $this->BM->siparisBasarili3d($q->basketId);
                redirect(site_url('cart/success'));
            }
        }
    }

    public function offer()
    {
        $this->BM->addTeklifOrder();
        redirect(site_url('cart/teklifSonuc'));
    }

    public function offerResult()
    {
        $data         = $this->Constract_model->getAllData();

        $this->load->view('header',$data);
        $this->load->view('offer-result');
        $this->load->view('footer');
    }
}
?>