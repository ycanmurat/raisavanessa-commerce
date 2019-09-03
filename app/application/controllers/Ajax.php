<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends Kodakil_Controller 
{
    private $result;

    function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->result = new StdClass();
        $this->result->status = false;
        $this->load->model($this->router->fetch_class() . '_model','model');
    }

    private function response()
    {
        echo json_encode($this->result);
    }

    public function register_user()
    {
        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('email','E-Mail','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone','Phone','required|min_length[7]|max_length[15]');
        $this->form_validation->set_rules('password','Password','required|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('password2','Password Again','required|min_length[2]|max_length[250]|matches[password]');
        if ($this->form_validation->run() != FALSE){
            $post_data = $this->getAllPosts();
            unset($post_data->password2);
            $post_data->password = password_hash($post_data->password, PASSWORD_DEFAULT);
            if ($this->model->add_user($post_data)) {
                    $this->load->library('euromessage');
                    $html = $this->load->view('mail/register',$post_data,true);
                    $data = new StdClass;
                    $data->subject = 'Wellcome To Raisavanessa.com';
                    $data->to = $post_data->email;
                    $data->html = $html;
                    $this->euromessage->send($data);
                $this->result->status = true;
                $this->result->redirect_url = site_url();
            } else {
                $this->result->error = 'We Cannot Create Your Registration Please Try Again Later';
            }
        } else {
            $this->result->error = validation_errors("<p class='alert alert-danger'>","</p>");
        }
        $this->response();
    }

    public function update_password()
    {
        $this->form_validation->set_rules('pass','Password','required|min_length[3]|max_length[250]');
        $this->form_validation->set_rules('pass2','Password Confirm','required|min_length[3]|max_length[250]|matches[pass]');
        if ($this->form_validation->run() != FALSE){
            $post_data  = $this->getAllPosts();
            $password   = password_hash($post_data->pass, PASSWORD_DEFAULT);
            if ($this->model->update_pass($password)) {
                $this->result->status = true;
            } else {
                $this->result->error = 'We Cannot Create Your Registration Please Try Again Later';
            }
        } else {
            $this->result->error = validation_errors("<p class='alert alert-danger'>","</p>");
        }
        $this->response();
    }

    public function add_rezervesion()
    {
        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[250]|trim');
        $this->form_validation->set_rules('surname','Surname','required|min_length[2]|max_length[250]|trim');
        $this->form_validation->set_rules('email','E-Mail','required|valid_email|max_length[250]|trim');
        $this->form_validation->set_rules('mobile','Phone','required|min_length[2]|max_length[250]|trim');
        $this->form_validation->set_rules('address','Address','required|min_length[2]|max_length[250]|trim');
        $this->form_validation->set_rules('message','Message','required|min_length[15]|trim');
        if ($this->form_validation->run() != FALSE){
            $post_data = $this->getAllPosts();
            if ($this->model->add_rezervesion($post_data)) {
                $this->result->status = true;
            } else {
                $this->result->error = 'We Cannot Create Your Registration Please Try Again Later';
            }
        } else {
            $this->result->error = validation_errors("<p class='alert alert-danger'>","</p>");
        }
        $this->response();
    }

    public function login_user()
    {
        $this->form_validation->set_rules('email','E-Mail or Phone Number','required');
        $this->form_validation->set_rules('password','Password','required|min_length[2]|max_length[250]');
        if ($this->form_validation->run() != FALSE){
            $post_data = $this->secure_post(['email','password']);
            if ($this->model->login_user($post_data)) {
                $this->result->status = true;
                $this->result->redirect_url = site_url();
            } else {
                $this->result->error = '<p class="alert alert-danger">Incorrect Username or Password</p>';
            }
        } else {
            $this->result->error = validation_errors("<p class='alert alert-danger'>","</p>");
        }
        $this->response();
    }

    public function password_reset()
    {
        $this->form_validation->set_rules('email','E-Mail','required');
        if ($this->form_validation->run() != FALSE){
            $email = $this->input->post('email', true);
            $user_information = $this->model->email_or_phone_check($email);
            if ($user_information) {
                $this->load->library('euromessage');
                $html = $this->load->view('mail/pass',$user_information,true);
                $data = new StdClass;
                $data->subject = 'Raisavanessa.com Password Reset Request';
                $data->to = $user_information->email;
                $data->html = $html;
                if ($this->euromessage->send($data)) {
                    $this->result->status = true;
                } else {
                    $this->result->error = 'We Can\'t Send Mail Right Now, Please Try Again Later';
                }
            } else {
                $this->result->error = 'An account was not found for the information you entered in our system.';
            }
        } else {
            $this->result->error = validation_errors("<p style='margin-bottom:4px;'>","</p>");
        }
        $this->response();
    }

    public function password_update()
    {
        $this->form_validation->set_rules('password','New Password','required|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('password_repeat','New Password (Again)','required|min_length[2]|max_length[250]|matches[password]');
        $this->form_validation->set_rules('reset_token','Password Reset Key','required|min_length[32]|max_length[32]|alpha_numeric');
        if ($this->form_validation->run() != FALSE){
            $post_data = $this->secure_post(['password','password_repeat','reset_token']);
            if ($this->model->update_password($post_data)) {
                $this->result->status = true;
            } else {
                $this->result->error = 'We Cannot Update Your Password, Please Try Again Later';
            }
        } else {
            $this->result->error = validation_errors("<p style='margin-bottom:4px;'>","</p>");
        }
        $this->response();
    }

    public function support_request_add()
    {
        $this->form_validation->set_rules('type','Subject','required|min_length[1]|max_length[1]|numeric');
        $this->form_validation->set_rules('message','Message','required|min_length[5]');
        if ($this->form_validation->run() != FALSE){
            $post_data = $this->secure_post(['type','message']);
            $post_data->added_time = now_time();
            $post_data->user_id = $this->session->userdata('user')->id;
            if ($support_information = $this->model->add_support_request($post_data)) {
                $this->result->status = true;
                $this->result->information = $support_information;
            } else {
                $this->result->error = 'We Cannot Create A Support Request, Please Try Again Later';
            }
        } else {
            $this->result->error = validation_errors("<p style='margin-bottom:4px;'>","</p>");
        }
        $this->response();
    }

    public function get_support_detail()
    {
        $this->form_validation->set_rules('id','Details Request','required|min_length[1]|max_length[11]|numeric');
        if ($this->form_validation->run() != FALSE){
            $id = $this->input->post('id', true);
            if ($support_information = $this->model->get_support_request((int) $id, $this->session->userdata('user')->id)) {
                $this->result->status = true;
                $this->result->information = $support_information;
            } else {
                $this->result->error = 'We Cannot View Your Support Request, Please Try Again Later';
            }
        } else {
            $this->result->error = validation_errors("<p style='margin-bottom:4px;'>","</p>");
        }
        $this->response();
    }

    public function addToCart()
    {   
        $data = $this->getAllPosts();
        $productStockCount = $this->model->productStock($data->id,$data->size,$data->color);

        if ($productStockCount < 1) {
            $this->result->status = false;
            $this->result->message = 'Sorry, This Product Is Out Of Stock.';
        }else{
            $this->load->model('Category_model');
            $colorDetail = $this->Category_model->getColorDetail($data->id,array($data->color))[0];
            $cData = array(
                'id'        => $data->id,
                'qty'       => 1,
                'price'     => $data->price,
                'name'      => $data->name,
                'image'     => $data->image,
                'slug'      => $data->slug,
                'slug_tr'   => $data->slug_tr,
                'options'   => array(
                    'size'        => $data->size,
                    'color'       => $data->color,
                    'colorDetail' => $colorDetail
                )
            );

            if ($this->cart->insert($cData) != false) {
                $this->result->status = true;
                $this->result->data = $this->cart->contents();
                $this->result->count = $this->cart->total_items();
                $this->result->total = $this->cart->total();
            }else{
                $this->result->status = false;
                $this->result->message = 'Something went wrong';
            }
        }

        $this->response();
    }

    public function removeToCart($row_id)
    {
        $data = array(
            'rowid' => $row_id,
            'qty'   => 0
        );
        
        $rt = $this->cart->update($data);
        $this->result->status = true;
        $this->result->data = $this->cart->contents();
        $this->result->count = $this->cart->total_items();
        $this->result->total = $this->cart->total();
        $this->response();
    }

    public function getTown($city = 0)
    {
        $this->load->model('Basket_model','BM');
        $q = $this->BM->getTownsByCity($city);

        if ($q != array()) {
            $this->result->status = true;
            $this->result->data = $q;
        }else{
            $this->result->status = false;
            $this->result->message = 'The Districts of the City You Chose Could Not Bring';
        }

        $this->response();
    }

    public function addOrder()
    {
        $data = $this->getAllPosts();

        if ($this->model->addOrder($data)) {
            $this->result->status = true;
        } else {
            $this->result->status = false;
            $this->result->error = '<div class="alert alert-danger" role="alert">We don\'t know what happened but something happened. Please try again later.</div>';
        }

        $this->response();
    }

    public function addOrderWithAddress()
    {
        $data = $this->getAllPosts();
        // prex($data);
        $this->form_validation->set_rules('name','Name','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('surname','Surname','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('phone','Phone','required|trim|min_length[8]|max_length[18]');
        $this->form_validation->set_rules('email','E-Mail','required|trim|valid_email');
        $this->form_validation->set_rules('city','City','required|trim|min_length[2]|max_length[18]');
        $this->form_validation->set_rules('town','Town','required|trim|min_length[2]|max_length[18]');
        $this->form_validation->set_rules('address','Address','required|min_length[3]');

        $this->form_validation->set_rules('bil_name','Billing Name','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('bil_surname','Billing Surname','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('bil_phone','Billing Phone','required|trim|min_length[8]|max_length[18]');
        $this->form_validation->set_rules('bil_email','Billing E-Mail','required|trim|valid_email');
        $this->form_validation->set_rules('bil_city','Billing City','required|trim|min_length[2]|max_length[18]');
        $this->form_validation->set_rules('bil_town','Billing Town','required|trim|min_length[2]|max_length[18]');
        $this->form_validation->set_rules('bil_address','Billing Address','required|min_length[3]');
        if ($this->form_validation->run() != false){
            $data = $this->getAllPosts();
            if ($this->model->addOrderWithAddress($data)) {
                $this->result->status = true;
            } else {
                $this->result->error = '<div class="alert alert-danger" role="alert">We don\'t know what happened but something happened. Please try again later.</div>';
            }
        } else {
            $this->result->error = validation_errors('<div class="alert alert-danger" role="alert">','</div>');
        }
        

        $this->response();
    }

    public function addAddress()
    {

        $this->form_validation->set_rules('title','Title','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('name','Name','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('surname','Surname','required|trim|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('phone','Phone','required|trim|min_length[8]|max_length[18]');
        $this->form_validation->set_rules('email','E-Mail','required|trim|valid_email');
        $this->form_validation->set_rules('city','City','required|trim|min_length[2]|max_length[18]');
        $this->form_validation->set_rules('town','Town','required|trim|min_length[2]|max_length[18]');
        $this->form_validation->set_rules('address','Address','required|min_length[3]');
        if ($this->form_validation->run() != false){
            $data = $this->getAllPosts();
            if ($this->model->addAddress($data)) {
                $this->result->status = true;
            } else {
                $this->result->status = false;
                $this->result->error = '<div class="alert alert-danger" role="alert">We don\'t know what happened but something happened. Please try again later.</div>';
            }
        } else {
            $this->result->error = validation_errors('<div class="alert alert-danger" role="alert">','</div>');
        }
        $this->response();
    }

    public function Bin($bin,$price)
    {

        $this->load->library('iyzico');

        $q = $this->iyzico->InstallmentQuery($bin,$price);

        $q = json_decode($q->GetrawResult());
        //prex($q);
        $a = array();
        if ($q->status == "success") {
            $ss = $q->installmentDetails[0]->installmentPrices;
            foreach ($ss as $key => $val) {
                $ss[$key]->installmentPrice = number_format(floatval($val->installmentPrice), 2, ',', '.');
            }

            $a['result'] = $ss; 
            $a['3d'] = $q->installmentDetails[0]->force3ds; 
            echo json_encode($a);
        }else{
            echo false;
        }
    }

    public function xBin($price)
    {

        $this->load->library('iyzico');

        $q = $this->iyzico->xInstallmentQuery($price);

        print_r($q->getRawResult());

        $q = json_decode($q->GetrawResult());
        return $q;
    }

    public function select_check($str)
    {
        if ($str == 0 ) {
            $this->form_validation->set_message('select_check', 'You have to make a selection for the {field} field.');
            return false;
        }
    }

    public function update_information()
    {
        $user = $this->session->userdata('user');
        $post_data = $this->getAllPosts();


        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[250]');

        if (isset($user->email) && $user->email != $post_data->email) {
            $this->form_validation->set_rules('email','E-Mail','required|valid_email|is_unique[users.email]');
        }
        if (isset($user->phone) && $user->phone != $post_data->phone) {
            $this->form_validation->set_rules('phone','Phone','required|numeric|is_unique[users.phone]|max_length[250]');
        }

        if ($this->form_validation->run() != false){
            if ($this->model->update_user_information($post_data, $user->id)) {
                $this->result->status = true;
            } else {
                $this->result->error = '<p class="alert alert-danger">Your new password cannot be the same as your old password.</p>';
            }
        } else {
            $this->result->error = validation_errors('<p class="alert alert-danger">','</p>');
        }

        $this->response();
    }

    public function get_counties()
    {
        $this->form_validation->set_rules('city_id', 'Şehir Tanımlayıcı Bilgisi', 'required|min_length[1]|max_length[11]|xss_clean|numeric');
        if ($this->form_validation->run() != FALSE) {
            $city_id = $this->input->post('city_id', true);
            if ($counties = $this->model->get_counties((int) $city_id)) {
                $this->result->status = true;
                $this->result->counties = $counties;
            } else {
                $this->result->error = 'İlçe Bilgilerine Ulaşılamıyor';
            }
        } else {
            $this->result->error = validation_errors();
        }
        $this->response();
    }

    public function update_password_information()
    {
        // prex($this->input->post());
        $this->form_validation->set_rules('old_pass','Current password','required|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('pass','New Password','required|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('pass2','New Password (Again)','required|min_length[2]|max_length[250]|matches[pass]');
        if ($this->form_validation->run() != false){
            $post_data = $this->secure_post(['old_pass','pass','pass2']);
            if (password_verify($post_data->old_pass, $this->session->userdata('user')->password)) {
                if ($this->model->update_password_information($post_data->pass, $this->session->userdata('user')->id)) {
                    $this->result->status = true;
                } else {
                    $this->result->error = '<p class="alert alert-danger">We Cannot Update Your Password, Please Try Again Later</p>';
                }
            } else {
                $this->result->error = '<p class="alert alert-danger">The Old Password You Entered Is Incorrect, Please Try Again</p>';
            }
        } else {
            $this->result->error = validation_errors('<p class="alert alert-danger">',"</p>");
        }
        $this->response();
    }

    public function search()
    {
        $this->form_validation->set_rules('keywords','Keywords','required|min_length[1]|max_length[250]');
        if ($this->form_validation->run() != false){
            $keywords = $this->input->post('keywords', true);
            if ($result = $this->model->get_search($keywords)) {
                $this->result->status = true;
                $this->result->information = $result;
            } else {
                $this->result->error = 'Sonuç Bulunamadı';
            }
        }
        $this->response();
    }

    public function addfavorites($id)
    {
        $user = $this->session->userdata('user');
        if (isset($user)) {
            $this->model->favChange($id,$user->id);
            $this->result->status = true;
        }else{
            $this->result->error = 1; // üye girişi yapmalısınız
        }
        $this->response();;
    }
    
    public function addToContact()
    {
        
        $user = $this->session->userdata('user');

        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[250]');
        $this->form_validation->set_rules('email','E-Mail','required|valid_email');
        $this->form_validation->set_rules('number','Phone Number','required|numeric|max_length[250]');
        $this->form_validation->set_rules('message','Message','required|min_length[5]');
        $this->form_validation->set_rules('section','Service','required');
        if ($this->form_validation->run() != false){
            $post_data = $this->getAllPosts();
            if ($this->model->addToContact($post_data)) {
                $this->result->status = true;
                $this->load->library('euromessage');
                $html = $this->load->view('mail/panel',array('data' => $post_data,'type' => 2),true);
                $data = new StdClass;
                $data->subject = 'Raisavanessa.com İletişim Formu Mesajı.';
                $data->to = 'info@raisavanessa.com';
                $data->html = $html;
                $this->euromessage->send($data);
            } else {
                $this->result->error = '<p class="alert alert-danger">A Technical Error Occurred Please Try Later</p>';
            }
        } else {
            $this->result->error = validation_errors('<p class="alert alert-danger">','</p>');
        }
        $this->response();
    }

    public function addBullettin()
    {
        $this->form_validation->set_rules('email','E-Mail','required|valid_email|is_unique[bulletin.newsLetterEmail]');
        if ($this->form_validation->run() != false){
            $email = $this->input->post('email',true);
            if ($this->model->addBullettin($email)) {
                $this->result->status = true;
            } else {
                $this->result->error = '<p class="alert alert-danger">A Technical Error Occurred Please Try Later</p>';
            }
        } else {
            $this->result->error = validation_errors('<p class="alert alert-danger">','</p>');
        }
        $this->response();
    }

    public function removeAddress($id)
    {
        $user = $this->session->userdata('user');
        if (isset($user)) {
            $this->model->removeAddress($id,$user->id);
            $this->result->status = true;
        }else{
            $this->result->error = 1; // üye girişi yapmalısınız
        }
        $this->response();
    }

    public function addCargoAdmin($id)
    {
        $text = $this->input->post('text',true);
        if ($this->model->addCargoAdmin($id,$text)) {
            $this->load->model('Basket_model');
            $postData = $this->Basket_model->getOrderById($id);
            $postData->shipmentKey = $text;
            $this->load->library('euromessage');

            $html = $this->load->view('mail/order_shipped',$postData,true);
            $data = new StdClass;
            $data->subject = 'Your order has been shipped';
            $data->to = $postData->email;
            $data->html = $html;
            $this->euromessage->send($data);

            $this->result->status = true;
        }else{
            $this->result->status = false;
            $this->result->error = 1; 
        }
        
        $this->response();
    }

    public function sendCollection()
    {
        $this->form_validation->set_rules('msg','Message','required|min_length[5]');
        $this->form_validation->set_rules('gsm','Telephone or E-Mail','required|min_length[5]');
        $this->form_validation->set_rules('name','Name & Surname','required|min_length[5]');
        if ($this->form_validation->run() != false){

            $this->load->library('euromessage');
            $postData = new StdClass;
            $postData->data = array();
            $postData->data['Type'] = 'New Collection Form';
            $postData->data['Name & Surname'] = $this->input->post('name');
            $postData->data['Telephone or E-Mail'] = $this->input->post('gsm');
            $postData->data['Message'] = $this->input->post('msg');

            $html = $this->load->view('mail/panel',$postData,true);
            $data = new StdClass;
            $data->subject = 'Collection Mesajınız var';
            $data->to = 'info@raisavanessa.com';
            $data->html = $html;
            $this->euromessage->send($data);
            $this->result->status = true;
        } else {
            $this->result->error = validation_errors('<p class="alert alert-danger">','</p>');
        }
        $this->response();
    }

    public function productChange()
    {
        $pData = $this->getAllPosts();

        foreach ($this->cart->contents() as $key => $val) {
            if ($key == $pData->row) {
                if ($pData->type == 0) {
                    $count = $val['qty'] - 1;
                }else{
                    $count = $val['qty'] + 1;
                }
            }
        }
        $data = array(
            'rowid' => $pData->row,
            'qty'   => $count
        );

        $this->cart->update($data);
        $this->result->status = true;
        $this->result->data = $this->cart->contents();
        $this->result->count = $this->cart->total_items();
        $this->result->total = $this->cart->total();
        $this->response();
    }

    public function addBespoke()
    {
        $this->form_validation->set_rules('bespoke_1','Bespoke 1','required|numeric');
        $this->form_validation->set_rules('bespoke_2','Bespoke 2','required|numeric');
        $this->form_validation->set_rules('bespoke_3','Bespoke 3','required|numeric');
        $this->form_validation->set_rules('bespoke_4','Bespoke 4','required|numeric');
        $this->form_validation->set_rules('bespoke_5','Bespoke 5','required|numeric');
        $this->form_validation->set_rules('bespoke_6','Bespoke 6','required|numeric');
        $this->form_validation->set_rules('bespoke_7','Bespoke 7','required|numeric');
        $this->form_validation->set_rules('bespoke_8','Bespoke 8','required|numeric');
        $this->form_validation->set_rules('bespoke_9','Bespoke 9','required|numeric');
        $this->form_validation->set_rules('bespoke_10','Bespoke 10','required|numeric');
        $this->form_validation->set_rules('bespoke_11','Bespoke 11','required|numeric');
        $this->form_validation->set_rules('note','Note','required');
        $this->form_validation->set_rules('product_id','Product','required');
        if ($this->form_validation->run() != false){
            $postData = $this->getAllPosts();
            $this->model->addBespoke($postData);
            $this->load->library('euromessage');
            $data = new StdClass;
            $data->data = array();
            $data->data['Bespoke Section 1 = '] = $postData->bespoke_1;
            $data->data['Bespoke Section 2 = '] = $postData->bespoke_2;
            $data->data['Bespoke Section 3 = '] = $postData->bespoke_3;
            $data->data['Bespoke Section 4 = '] = $postData->bespoke_4;
            $data->data['Bespoke Section 5 = '] = $postData->bespoke_5;
            $data->data['Bespoke Section 6 = '] = $postData->bespoke_6;
            $data->data['Bespoke Section 7 = '] = $postData->bespoke_7;
            $data->data['Bespoke Section 8 = '] = $postData->bespoke_8;
            $data->data['Bespoke Section 9 = '] = $postData->bespoke_9;
            $data->data['Bespoke Section 10 = '] = $postData->bespoke_10;
            $data->data['Bespoke Section 11 = '] = $postData->bespoke_11;
            $data->data['Note = '] = $postData->note;
            $data->data['Product ID(for search) = '] = $postData->product_id;
            $html = $this->load->view('mail/panel',$data,true);
            $data = new StdClass;
            $data->subject = 'Bespoke Mesajınız var';
            $data->to = 'info@raisavanessa.com';
            $data->html = $html;
            $this->euromessage->send($data);
            $this->result->status = true;
        } else {
            $this->result->error = validation_errors('<p class="alert alert-danger">','</p>');
        }
        $this->response();
    }

    public function kurChange()
    {
        $cur = $this->input->post('cur',true);
        $kur = $this->Constract_model->getKur();
        foreach ($kur as $key => $val) {
            if ($val->code == $cur) {
                $this->session->set_userdata('cur',$cur);
                $this->result->status = true;
            }
        }
        if ($cur == 'TL') {
            $this->session->set_userdata('cur',$cur);
            $this->result->status = true;
        }
        $this->response();
    }

    public function loadMore($category,$page)
    {
        $data = new StdClass;
        $kur = $this->Constract_model->getKur();
        $this->load->model('Category_model');
        if ($category == 'last') {
            $data->products = $this->Category_model->getProductsAll($page);
        }elseif ($category == 'sale') {
            $data->products = $this->Category_model->getProductByCategory(24,$page);
        }else{
            $data->products = $this->Category_model->getProductByCategory($category,$page);
        }
        if (count($data->products) != 15) {
            $data->nextPage = $page;
            $data->isLast = true;
        }else{
            $data->nextPage = $page + 1;
            $data->isLast = false;
        }

        foreach ($data->products as $key => $val) {
            $data->products[$key]->currentPrice = number_format(currencyChange($kur,$this->session->userdata('cur'),$val->price),2,',','.');
            $data->products[$key]->currentOldPrice = number_format(currencyChange($kur,$this->session->userdata('cur'),$val->old_price),2,',','.');
        }
        $this->result->data = $data;
        $this->result->status = true;

        $this->response();
    }
}