<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Statics extends Kodakil_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Statics_model','SM');
        $this->curValid();
	}
	
	public function index($slug='')
	{
        $data              = $this->Constract_model->getAllData();
        $data->static = $this->SM->getStaticPage($slug);
        
        // prex($data->static);
		if ($data->static) {
            $this->load->view('header', $data);
			$this->load->view('staticpage');
			$this->load->view('footer');
		}else{
            $this->output->set_status_header('404');
            $this->load->view('header', $data);
            $this->load->view('404');
            $this->load->view('footer');
		}
	}

    public function collections()
    {
        $data              = $this->Constract_model->getAllData();
        $data->list = $this->Constract_model->getCollection();

        $this->load->view('header', $data);
        $this->load->view('collections');
        $this->load->view('footer');
    }

    public function archive()
    {
        $data              = $this->Constract_model->getAllData();
        $data->list = $this->Constract_model->getCorporate(2);

        $this->load->view('header', $data);
        $this->load->view('archive');
        $this->load->view('footer');
    }

    public function legal()
    {
        $data              = $this->Constract_model->getAllData();
        $data->list = $this->SM->getFaqs();
        
        $this->load->view('header', $data);
        $this->load->view('legal-area');
        $this->load->view('footer');
    }
}
?>