<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends Kodakil_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $this->curValid();
        $data              = $this->Constract_model->getAllData();
        // prex($data);
        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    // public function test()
    // {
    //     $this->curValid();
    //     $data              = $this->Constract_model->getAllData();
    //     // prex($data->archives);

    //     $this->load->view('header', $data);
    //     $this->load->view('index');
    //     $this->load->view('footer');
    // }

    public function main()
    {
        if ($this->input->post()) {
            $this->session->set_userdata('cur',$this->input->post('cur',true));
            if ($this->input->post('lang',true) == 1) {
                redirect(site_url($this->input->post('redirect',true)));
            }else{
                redirect(site_url('tr/'.$this->input->post('redirect',true)));
            }
        }
        $data              = $this->Constract_model->getAllData();
        $data->redirect = $this->input->get('rd',true);
        $this->load->view('preferences', $data);
    }

    public function newpass($reset_token = '')
    {
        if (!empty($reset_token) && strlen($reset_token) == 32) {

            $data              = $this->Constract_model->getAllData();
            $data->reset_token = $reset_token;
            if ($data->user_information = $this->Home_model->get_reset_information($reset_token)) {
                $data->statics     = $this->Constract_model->getLangStatics();
                $data->footerPage = $this->Constract_model->footerPage();
                $data->categories = $this->getCategories();
                $this->load->view('header', $data);
                $this->load->view('reset-password');
                $this->load->view('footer');
            } else {
                redirect(site_url());
            }
        } else {
            redirect(site_url());
        }
    }

    public function sss()
    {
        $data              = $this->Constract_model->getAllData();

        $data->sss = $this->Home_model->getSss();

        $this->load->view('header', $data);
        $this->load->view('sss');
        $this->load->view('footer');
    }

    public function m404()
    {

        $data              = $this->Constract_model->getAllData();
        $this->output->set_status_header('404');
        $this->load->view('header', $data);
        $this->load->view('404');
        $this->load->view('footer');
    }




    public function communique()
    {
        $this->curValid();
        $data              = $this->Constract_model->getAllData();
        
        $this->load->view('header', $data);
        $this->load->view('communique');
        $this->load->view('footer');
    }

    public function xml()
    {
        header("Content-type: text/xml");
        $q = $this->Constract_model->getAllProductsWithPrice();
        $xml = '
        <rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">
        <channel>
        <title>Raisavanessa</title>
        <link rel="self" href="'.site_url().'"/>
        <description><![CDATA[Raisavanessa , DEMI COUTURE, PRET A PORTER, GOWNS, JACKETS, DRESSES, JUMPSUITS, KNITWEAR, TOPS & SHIRTS, BODYSUITS, TROUSERS, SHORTS, SKIRTS, SWEATSHIRT, ACCESSORIES]]></description>';
        foreach ($q as $key => $val) {
            $xml .= '
            <item>
            <g:id>'.trim($val->kod).'</g:id>
            <g:title>'.$val->product_name.'</g:title>
            <g:description><![CDATA['.trim(strip_tags(str_replace('
                ', '', $val->description))).']]></g:description>
            <g:price>'.$val->price_tr.' TRY</g:price>
            <g:image_link>'.site_url($val->product_image).'</g:image_link>
            <g:link>'.site_url('product/'.$val->slug).'/'.$val->id.'</g:link>
            <g:condition>new</g:condition>
            <g:availability>in stock</g:availability>
            <g:google_product_category>1604</g:google_product_category>
            <g:brand>Raisavanessa</g:brand>
            <g:adult>no</g:adult>
            </item>';
        }
        $xml .= '
        </channel>
        </rss>';
        echo $xml;
    }


    public function gdpr()
    {
        $this->curValid();
        $data              = $this->Constract_model->getAllData();
        
        $this->load->view('header', $data);
        $this->load->view('gdpr');
        $this->load->view('footer');
    }

    public function test()
    {
        $this->load->library('euromessage');
        $post_data = new StdClass;
        $post_data->email = 'demo@example.com';
        $post_data->name = 'Uğur';
        $post_data->surname = 'yetkil';
        $html = $this->load->view('mail/register',$post_data,true);
        $data = new StdClass;
        $data->subject = 'Wellcome To Raisavanessa.com';
        $data->to = $post_data->email;
        $data->html = $html;
        $this->euromessage->send($data);
    }
}
