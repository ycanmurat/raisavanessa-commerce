<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Product extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
        $this->load->model('Product_model','model');
        $this->load->model('Category_model');
        $this->curValid();
	}
	
	public function index($id){
		$data 				= $this->Constract_model->getAllData();
        $data->product      = $this->model->getProductBySlug($id);
        // prex($data->product);
        if ($data->product == false) {
            $this->output->set_status_header('404');
            $this->load->view('header', $data);
            $this->load->view('404');
            $this->load->view('footer');
        }else{
            $data->user = $this->session->userdata('user');
            $size = array();
            $color = array();
            
            foreach ($data->product->size as $key => $val) {
                $data->product->size[$key]->priceCurrent = number_format(currencyChange($data->kur,$this->session->userdata('cur'),($val->price ?? 0)),2,',','.');
                $size[] = $val->size;
                $color[] = $val->color;
            }

            $data->product->onlySize = array_unique($size);
            $onlyColor = array_unique($color);

            $data->product->onlyColor = $this->Category_model->getColorDetail($data->product->Id,$onlyColor);
            
            if (!empty($data->user)) {
                $data->favStatus = $this->model->productFavStatus($data->product->Id,$data->user->id);
            }else{
                $data->favStatus = false;
            }

            if (empty($data->product->similar)) {
                $data->product->similar = array();
            }

            // prex($data->product);
            
            $this->load->view('header',$data);
            $this->load->view('product-detail');
            $this->load->view('footer');
        }
	}
}
?>