<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Products extends Kodakil_Controller
	{
		function __construct(){
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Products_model');
		}

		public function index(){
			$data 				= new StdClass;
			$data->mainMenu 	= 'Products';
			$data->subMenu 		= 'ProductsList';

            if ($this->input->get('q')) {
                $q = $this->input->get('q');
                $data->q = $q;
            }else{
                $q = '';
            }

            $data->pageCount    = $this->Products_model->getProductPageCount($q);
            if ($this->input->get('p')) {
                $p = (int)$this->input->get('p');
                if ($p < 1) {
                    $p = 1;
                }
                if ($p > $data->pageCount) {
                    $p = $data->pageCount;
                    $data->p = $p;
                }
            }else{
                $p = 1;
            }


			$data->productInfo 	= $this->Products_model->productInfo($p,$q);
            $data->page = $p;

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/products');
			$this->load->view('Admin/footer');
		}

		public function add(){
			$data 			= new StdClass;
			$data->mainMenu = 'Products';
			$data->subMenu 	= 'ProductsAdd';
			$data->menus	= $this->Products_model->getMenus();

            $data->products = $this->Products_model->getProductCodes();
			if($this->input->post()){
				$this->form_validation->set_rules('product_name', 'Ürün Adı', 'required');
                // $this->form_validation->set_rules('price_tr', 'Fiyat TL', 'required|numeric');
				$this->form_validation->set_rules('price', 'Fiyat EUR', 'required|numeric');
				if ($this->form_validation->run() == FALSE){
					$this->load->view('Admin/header',$data);
					$this->load->view('Admin/products_add');
					$this->load->view('Admin/footer');
                }else{
					$postData = $this->getAllPosts();
                    $postData->slug = url_seo($postData->product_name.' '.$postData->kod);
                    $postData->tr_slug = url_seo($postData->tr_product_name.' '.$postData->kod);
                    $postData->similar = json_encode($postData->similar);
					$postData->product_image = $this->session->userdata('productImage');
                    $imageFiles = reverseArray($_FILES['files']);
                    $images = array();

                    foreach ($imageFiles as $key => $val) {
                        $q = $this->Products_model->ProductImageUploadWithData($val);
                        if ($q != false) {
                            $images[] = array('name' => $q);
                        }
                    }
                    if (isset($postData->preorder)) {
                         $postData->preorder = 1;
                     }

					if($this->Products_model->addProduct($postData,$images)){
						$this->session->set_flashdata('onay','1');
					}else{
						$this->session->set_flashdata('hata','1');
					}
                    $this->session->unset_userdata('productImage');
					$this->session->unset_userdata('productFile');
					redirect(admin_url('Products/add'));
                }
			}else{
				$this->load->view('Admin/header',$data);
				$this->load->view('Admin/products_add');
				$this->load->view('Admin/footer');
			}
		}

		public function ImageUpload(){
			$sonuc = $this->Products_model->ProductImageUpload();
			if ($sonuc != false){
				$this->session->set_userdata('productImage', $sonuc);
			}
		}


        public function deleteSize($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('product_variant');

            redirect($this->agent->referrer());
        }

        public function deleteColor($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('product_color');

            redirect($this->agent->referrer());
        }

        public function editColor($id)
        {
            $data           = new StdClass;
            $data->mainMenu = 'Products';
            $data->subMenu  = 'ProductsList';
            $data->pInfo    = $this->Products_model->product($id);
            $data->menus    = $this->Products_model->getMenus();
            $data->id       = $id;

            if($data->pInfo==false){
                redirect(admin_url('Products'));
            }
            
            $data->pSize    = $this->Products_model->getColor($id);
            
            if($this->input->post()){
                $postData = $this->getAllPosts();
                $postData = reverseArray($postData);
                $ary = array();
                foreach ($postData as $key => $val) {
                    $tmp = $val;
                    $tmp['id'] = $key;
                    $ary[] = $tmp;
                }  

                if ($this->Products_model->setColor($ary)) {
                    $this->session->set_flashdata('onay','1');
                }else{
                    $this->session->set_flashdata('hata','1');
                }
                redirect(current_url());
            }else{
                $this->load->view('Admin/header',$data);
                $this->load->view('Admin/products_color');
                $this->load->view('Admin/footer');
            }
        }

        public function stocs($id)
        {
            $data           = new StdClass;
            $data->mainMenu = 'Products';
            $data->subMenu  = 'ProductsList';
            $data->pInfo    = $this->Products_model->product($id);
            $data->menus    = $this->Products_model->getMenus();
            $data->id       = $id;

            if($data->pInfo==false){
                redirect(admin_url('Products'));
            }
            
            $data->colorsize    = $this->Products_model->getStokAndColor($id);
            
            if($this->input->post()){
                $postData = $this->getAllPosts();
                // prex($postData);
                $postData = reverseArray($postData);
                $ary = array();
                foreach ($postData as $key => $val) {
                    $tmp = $val;
                    $tmp['product_id'] = $id;
                    $ary[] = $tmp;
                }

                if ($this->Products_model->setStokAndColor($ary,$id)) {
                    $this->session->set_flashdata('onay','1');
                }else{
                    $this->session->set_flashdata('hata','1');
                }
                redirect(current_url());
            }else{
                $this->load->view('Admin/header',$data);
                $this->load->view('Admin/products_stokCari');
                $this->load->view('Admin/footer');
            }
        }

        public function fileUpload()
        {
            $sonuc = $this->Products_model->ProductImageUpload();
            if ($sonuc != false){
                $this->session->set_userdata('productFile', $sonuc);
            }
        }

		public function editStatus($Id,$st){
			if($this->Products_model->editStatus($Id,$st)){
				redirect(admin_url('Products'));
			}else{
				redirect(admin_url('Products'));
			}
		}

		public function deleteProduct($Id){
			if($this->Products_model->deleteProduct($Id)){
				redirect(admin_url('Products'));
			}else{
				redirect(admin_url('Products'));
			}
		}

        public function editSize($id)
        {
            $data           = new StdClass;
            $data->mainMenu = 'Products';
            $data->subMenu  = 'ProductsList';
            $data->pInfo    = $this->Products_model->product($id);
            $data->menus    = $this->Products_model->getMenus();
            $data->id       = $id;

            if($data->pInfo==false){
                redirect(admin_url('Products'));
            }
            
            $data->pSize    = $this->Products_model->getSizes($id);
            
            if($this->input->post()){
                $postData = $this->getAllPosts();
                $postData = reverseArray($postData);
                $ary = array();
                foreach ($postData as $key => $val) {
                    $tmp = $val;
                    $tmp['id'] = $key;
                    $ary[] = $tmp;
                }  

                if ($this->Products_model->setSizez($ary)) {
                    $this->session->set_flashdata('onay','1');
                }else{
                    $this->session->set_flashdata('hata','1');
                }
                redirect(current_url());
            }else{
                $this->load->view('Admin/header',$data);
                $this->load->view('Admin/products_size');
                $this->load->view('Admin/footer');
            }
        }

        public function addSize($id)
        {
            $data = $this->getAllPosts();
            $data->product_id = $id;
            $this->Products_model->addSize($data);
            redirect($this->agent->referrer());
        }

        public function addColor($id)
        {
            $data = $this->getAllPosts();
            $data->product_id = $id;
            $this->Products_model->addColor($data);
            redirect($this->agent->referrer());
        }

		public function editProduct($Id){
			$data 			= new StdClass;
			$data->mainMenu = 'Products';
			$data->subMenu 	= 'ProductsList';
			$data->pInfo 	= $this->Products_model->product($Id);
			$data->menus	= $this->Products_model->getMenus();
			$data->id  		= $Id;
			if($data->pInfo==false){
				redirect(admin_url('Products'));
			}

            $data->products = $this->Products_model->getProductCodes();
            // prex($data->products);
            $data->pInfo->similar = json_decode($data->pInfo->similar);
            if (empty(($data->pInfo->similar))) {
                $data->pInfo->similar = array();
            }

			$data->images = $this->Products_model->getProductImageById($Id);
			
			if($this->input->post()){
                // $this->form_validation->set_rules('price_tr', 'Fiyat TL', 'required|numeric');
                $this->form_validation->set_rules('price', 'Fiyat EUR', 'required|numeric');
				if ($this->form_validation->run() == FALSE){
					$this->load->view('Admin/header',$data);
					$this->load->view('Admin/products_edit');
					$this->load->view('Admin/footer');
                }else{
					$postData = $this->getAllPosts();
                    // prex($postData);
                    $postData->slug = url_seo($postData->product_name.' '.$postData->kod);
                    $postData->tr_slug = url_seo($postData->tr_product_name.' '.$postData->kod);
                    $postData->similar = json_encode($postData->similar);
                    $imageFiles = reverseArray($_FILES['files']);
                    $images = array();

                    foreach ($imageFiles as $key => $val) 
                    {
                        $q = $this->Products_model->ProductImageUploadWithData($val);
                        if ($q != false){
                            $images[] = array('name' => $q,'product_id' => $Id);
                        }
                    }
                    if ($this->session->userdata('productImage')) {
                        $postData->product_image = $this->session->userdata('productImage');
                        $this->session->unset_userdata('productImage');
                    }

                    $postData->description = $this->input->post('description');
                    $postData->tr_description = $this->input->post('tr_description');

                    if (isset($postData->preorder)) {
                         $postData->preorder = 1;
                     }
					if($this->Products_model->eProduct($postData,$Id,$images)){
						$this->session->set_flashdata('onay','1');
					}else{
						$this->session->set_flashdata('hata','1');
					}
					redirect(admin_url('Products/editProduct/'.$data->pInfo->Id));
				}

			}else{
				$this->load->view('Admin/header',$data);
				$this->load->view('Admin/products_edit');
				$this->load->view('Admin/footer');
			}
		}

		public function NewsProductAdd(){
			$header_data 			= new StdClass;
			$data 					= new StdClass;
			$header_data->mainMenu 	= 'Products';
			$header_data->subMenu 	= 'NewsProductAdd';
			$data->products 		= $this->Products_model->newProductInfo();
			if($this->input->post()){
				$product_id = $this->input->post('product_id',true);
				if($this->Products_model->ProductIsThere($product_id)){
					$this->session->set_flashdata('urun_var','1');
					redirect(admin_url('Products/NewsProductAdd'));
				}else{
					if($this->Products_model->addNewProduct($product_id)){
						$this->session->set_flashdata('onay','1');
						redirect(admin_url('Products/NewsProductAdd'));
					}else{
						$this->session->set_flashdata('hata','1');
						redirect(admin_url('Products/NewsProductAdd'));	
					}
				}
			}
			$data->getNewsProduct = $this->Products_model->getNewsProduct();
			$this->load->view('Admin/header',$header_data);
			$this->load->view('Admin/new_product',$data);
			$this->load->view('Admin/footer');
		}

		public function deleteNewProduct($Id){
			if($this->Products_model->deleteNewProduct($Id)){
				redirect(admin_url('Products/NewsProductAdd'));
			}else{
				redirect(admin_url('Products/NewsProductAdd'));
			}
		}

		public function editCampaignStatus($Id,$campaign_info){
			if($this->Products_model->editCampaignStatus($Id,$campaign_info)){
				$this->session->set_flashdata('campaign','1');
				redirect(admin_url('Products'));
			}else{
				redirect(admin_url('Products'));
			}
		}

		public function editSliderStatus($Id,$slider_down_info){
			$data = new StdClass;
			if ($slider_down_info==0) {
				if ($this->Products_model->SliderStatusOff($Id)) {
					$this->session->set_flashdata('off','1');
					redirect(admin_url('Products'));
				}else{
					$this->session->set_flashdata('off','2');
					redirect(admin_url('Products'));
				}
			}else{
				if ($this->Products_model->SliderStatusOn($Id)) {
					$this->session->set_flashdata('on','1');
					redirect(admin_url('Products'));
				}else{
					$this->session->set_flashdata('on','3');
					redirect(admin_url('Products'));
				}
			}
		}
		public function deleteimages($id,$page_id)
		{
			$this->Products_model->deleteProductImage($id);
			redirect(admin_url('Products/editProduct/'.$page_id));
		}
		
        
        public function excel()
        {
            $data               = new StdClass;
            $data->mainMenu     = 'Products';
            $data->subMenu      = 'ProductsExcel';

            if (!empty($_FILES['file']['name'])) {
                $config['upload_path'] = 'assets/uploads/excels/';
                $config['allowed_types'] = 'xlsx';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('result',$this->upload->display_errors());
                    prex($this->upload->display_errors());
                } else {
                    $file_name = 'assets/uploads/excels/'.$this->upload->data()['file_name'];
                                        
                    $reader = PHPExcel_IOFactory::createReader('Excel2007');
                    $reader->setReadDataOnly(true);
                    $file = $file_name ?? '';
                    $objPHPExcel = $reader->load($file);
                    $objWorksheet = $objPHPExcel->getActiveSheet();
                    $header=true;
                    if ($header) {
                        $highestRow = $objWorksheet->getHighestRow();
                        $highestColumn = $objWorksheet->getHighestColumn();
                        $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
                        $headingsArray = $headingsArray[1];
                        $r = -1;
                        $namedDataArray = array();
                        for ($row = 2; $row <= $highestRow; ++$row) {
                            $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                            if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                                ++$r;
                                foreach ($headingsArray as $columnKey => $columnHeading) {
                                    $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                                }
                            }
                        }
                    } else {
                        //excel sheet with no header
                        $namedDataArray = $objWorksheet->toArray(null, true, true, true);
                    }
                }
                prex($namedDataArray);
            }
            


            $this->load->view('Admin/header',$data);
            $this->load->view('Admin/products_excel');
            $this->load->view('Admin/footer');
        }
	}
?>