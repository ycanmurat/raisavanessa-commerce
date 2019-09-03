<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Campaign extends Kodakil_Controller
{
	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->load->model('Admin/Campaign_model','CM');
	}

	public function index(){
		$data 			= new StdClass;
		$data->mainMenu = 'Campaign';
		$data->subMenu	= 'CampaignList';

		$data->getTrend = $this->CM->getTrend();

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/campaign');
		$this->load->view('Admin/footer');
	}

	public function editTrendStatus($Id,$newStatus){
		if($this->CM->editTrendStatus($Id,$newStatus)){
			redirect(admin_url('Campaign'));
		}else{
			redirect(admin_url('Campaign'));
		}
	}

	public function trendSort()
	{
		if ($this->input->post()) {
			$postData = $this->getAllPosts();
			$statusArray = array();
			//Gelen verileri foreach'e sokmamızın sebebi; Veritabanı kısmında sorgu yada ekleme yaparken döngü kullanmamız gerektiği için.
			foreach ($postData->sort as $key => $value) {
				$statusArray[$key]['Id'] = $key;
				$statusArray[$key]['trend_sort'] = $value;
			}
			if ($this->CM->sortUpdate($statusArray)) {
				redirect(admin_url('Campaign'));
			}else{
				redirect(admin_url('Campaign'));
			}
		}
	}
}
?>