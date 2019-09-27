<?php 
/**
 * 
 */
class Category extends Kodakil_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
        $this->curValid();
	}

	public function index($id = '')
	{
		$data             = $this->Constract_model->getAllData();

        $data->pageCount    = $this->Category_model->getProductPageCount($id);
        //prex($data->pageCount);
        if ($this->input->get('p')) {
            $p = (int)$this->input->get('p');
            if ($p < 1) {
                $p = 1;
            }
            if ($p > $data->pageCount) {
                $p = $data->pageCount;
            }
        }else{
            $p = 1;
        }
        $data->page = $p;
        $data->products   = $this->Category_model->getProductByCategory($id,$p);
		$data->category   = $this->Category_model->getMenuText($id);
        $data->type = 1;
        // prex($data->products);
		if ($data->category == array()) {
            $this->output->set_status_header('404');
            $this->load->view('header', $data);
            $this->load->view('404');
            $this->load->view('footer');
        }else{
    		$this->load->view('header',$data);
    		$this->load->view('listing');
    		$this->load->view('footer');
        }
	}

    public function search()
    {
        $data            = $this->Constract_model->getAllData();
        $data->searchKey = $this->input->get('k');
        $data->type = 4;

        if (empty(trim($data->searchKey))) {
            $this->output->set_status_header('404');
            $this->load->view('header', $data);
            $this->load->view('404');
            $this->load->view('footer');
        }else{
            $data->products  = $this->Category_model->getProductsBySearchKey($data->searchKey);
            $this->load->view('header',$data);
            $this->load->view('listing');
            $this->load->view('footer');
        }
    }

    public function last()
    {
        $data             = $this->Constract_model->getAllData();
        $data->type = 2;

        $data->pageCount    = $this->Category_model->getProductPageCountAll();
        if ($this->input->get('p')) {
            $p = (int)$this->input->get('p');
            if ($p < 1) {
                $p = 1;
            }
            if ($p > $data->pageCount) {
                $p = $data->pageCount;
            }
        }else{
            $p = 1;
        }
        $data->page = $p;


        $data->products   = $this->Category_model->getProductsAll($p);
        /*
        foreach ($data->products as $key => $val) {
            $size = array();
            $color = array();
            foreach ($val->size as $key2 => $val2) {
                $size[] = $val2->size;
                $color[] = $val2->color;
            }
            $data->products[$key]->onlySize = array_unique($size);
            $data->products[$key]->onlyColor = array_unique($color);
            
            if (strpos($val->variants, ',') !== false) {
                $data->products[$key]->variants = explode(',', $val->variants);
            }else{
                $data->products[$key]->variants = array();
            }
        }*/

        $this->load->view('header',$data);
        $this->load->view('listing');
        $this->load->view('footer');
    }


    public function sale()
    {
        $data             = $this->Constract_model->getAllData();
        $data->type = 3;

        $data->pageCount    = $this->Category_model->getProductPageCount(24);
        if ($this->input->get('p')) {
            $p = (int)$this->input->get('p');
            if ($p < 1) {
                $p = 1;
            }
            if ($p > $data->pageCount) {
                $p = $data->pageCount;
            }
        }else{
            $p = 1;
        }
        $data->page = $p;
        $data->products   = $this->Category_model->getProductByCategory(24,$p);
        $data->category   = $this->Category_model->getMenuText(24);
        // prex($data->products);
        $this->load->view('header',$data);
        $this->load->view('listing');
        $this->load->view('footer');
    }

    public function bespoke()
    {

        $data           = $this->Constract_model->getAllData();
        $data->products = $this->Category_model->getAllProducts();
        $data->selected = $this->input->get('product',true);
        
        $this->load->view('header',$data);
        $this->load->view('bespoke');
        $this->load->view('footer');
    }

}
?>

