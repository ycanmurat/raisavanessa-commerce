<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Orders extends Kodakil_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->checkLogin();
			$this->load->model('Admin/Orders_model');
		}

		public function index()
		{
			$data 					= new StdClass;
			$data->mainMenu 	= 'Orders';
			$data->subMenu	= 'orderList';
			$data->orders = $this->Orders_model->get_orders();
			$sub = 0;
	        $t = 0;
	        foreach ($data->orders as $key => $val) {
	            foreach ($val['line'] as $key2 => $value) {
	                $data->orders[$key]['line'][$key2]['total'] = $value['price'] * $value['qty'];
	            }
	        }
	        foreach ($data->orders as $key => $val) {
	            foreach ($val['line'] as $key2 => $value) {
	                $data->orders[$key]['line'][$key2]['total'] = $value['price'] * $value['qty'];
	                if ($t == $key) {
	                    $sub += $value['total'];
	                }
	            }
	            $t++;
	            $data->orders[$key]['sub'] = $sub;
	            $sub = 0;
	        }

	        

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/orders');
			$this->load->view('Admin/footer');
		}

		public function deleteOrder($Id)
		{
			if ($this->Orders_model->deleteOrder($Id)) {
				redirect(admin_url('Orders'));
			} else {
				redirect(admin_url('Orders'));
			}
		}

		public function cargo($Id)
		{
			if ($this->Orders_model->cargo($Id)) {
				redirect(admin_url('Orders'));
			} else {
				redirect(admin_url('Orders'));
			}
		}

		public function detail($id)
        {
            $data           = new StdClass;
            $data->mainMenu = 'Orders';
            $data->subMenu  = 'orderList';
            $data->order   = $this->Orders_model->getOrderDetailById($id);

            $data->order->product_prices = 0;
            $data->order->product_counts = 0;
            foreach ($data->order->lines as $key => $val) {
                $data->order->product_prices += $val->price*$val->qty;
                $data->order->product_counts += $val->qty;
            }

            //prex($data->order);

            $this->load->view('Admin/header',$data);
            $this->load->view('Admin/order_detail');
            $this->load->view('Admin/footer');
        }

        public function orderCancel($id)
        {
            $this->Orders_model->orderStatus($id,2);
            redirect($this->agent->referrer());
        }

        public function orderSuccess($id)
        {
            $this->Orders_model->orderStatus($id,3);
            redirect($this->agent->referrer());
        }

        public function orderPrep($id)
        {
            $this->Orders_model->orderStatus($id,4);
            redirect($this->agent->referrer());
        }
	}
?>