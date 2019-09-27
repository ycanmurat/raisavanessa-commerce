<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sociallogin extends Kodakil_Controller
{
	private $configureProviders;
	private $service;
	private $httpClient;
	private $collectionFactory;

	function __construct()
	{
		parent::__construct();
		$this->configureProviders = [
			'redirectUri' => site_url('Sociallogin/callback'),
			'provider' => [
                'facebook' => [
                    'applicationId' => '143207417621543',
                    'applicationSecret' => '68b69ec5746dbf2089846389d3a58c32',
                    'scope' => ['email','public_profile'],
                    'options' => [
                        'identity.fields' => [
                            'email',
                            'name'
                        ],
                    ],
                ],
                'google' => [
                    'applicationId' => '415312078108-r6vuae0ttap7e5ram5g6b615q6vla5q7.apps.googleusercontent.com',
                    'applicationSecret' => 'ZL4jPAuYskbVjHTd4VdmcSfH',
                    'scope' => ['email','profile']
                ],
			],
		];

		$this->httpClient = new SocialConnect\Common\Http\Client\Curl;
		$this->service = new SocialConnect\Auth\Service(
			$this->httpClient,
			new SocialConnect\Provider\Session\Session(),
			$this->configureProviders
		);

		$this->collectionFactory = NULL;

		$this->service = new SocialConnect\Auth\Service(
			$this->httpClient,
			new SocialConnect\Provider\Session\Session(),
			$this->configureProviders,
			$this->collectionFactory
		);

		$this->load->model('Sociallogin_model','model');
	}

	public function index($provider_name)
	{
        $this->session->set_userdata('provider_name',$provider_name);
		if (!empty($provider_name) && !ctype_digit($provider_name)) {
			if (isset($this->configureProviders['provider'][$provider_name])){
				try {
					$provider = $this->service->getProvider($provider_name);
					if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], base_url()) !== FALSE) {
						$this->session->set_flashdata('login_redirect_url', $_SERVER['HTTP_REFERER']);
					}
					try {
						$auth_url = $provider->makeAuthUrl();
						header('Location:'. $auth_url);
					} catch (\Exception $e) {
						redirect(site_url('login'));
					}
				} catch (\Exception $e) {
					redirect(site_url('login'));
				}
			}
		} else {
			redirect(site_url('login'));
		}
	}

	public function callback()
	{
		$data = new stdClass();
        try {
            $provider_name = $this->session->userdata('provider_name');
            $this->session->unset_userdata('provider_name');
            $provider = $this->service->getProvider($provider_name);
            $accessToken = $provider->getAccessTokenByRequestParameters($_GET);
            $user = $provider->getIdentity($accessToken);
        } catch (\Exception $e) {
            $this->session->set_flashdata('social_error','Google dan Bilgilerinizi Alamıyoruz, Lütfen Daha Sonra Tekrar Deneyin.');
            redirect(site_url());
        }

		if ($this->model->userControl($user->email)) {
			if ($this->model->loginUser($user->email)) {
                redirect(site_url());
			} else {
				$this->session->set_flashdata('social_error','Google dan Bilgilerinizi Alamıyoruz, Lütfen Daha Sonra Tekrar Deneyin.');
				redirect(site_url('login'));
			}
		} else {
			$info = explode(" ", $user->fullname);
			$data->name = $info[0];
			$data->surname = end($info);
            if (empty($user->email)) {
                $data->email = $user->id.'@fb.com';
            }else{
                $data->email = $user->email;
            }
            if ($this->model->addSocialUser($data)) {
                redirect(site_url());
            } else {
                $this->session->set_flashdata('social_error','Facebooktan Bilgilerinizi Alamıyoruz, Lütfen Daha Sonra Tekrar Deneyin.');
                redirect(site_url('login'));
            }
		}
	}
}