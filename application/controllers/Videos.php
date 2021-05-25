<?php

class Videos extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->helper('url_helper');

		// Load form helper library
		$this->load->helper('form');

		$this->load->helper('file');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');

	}


	public function view($page)
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);

		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Signin to view this page!';
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login', $data);
			$this->load->view('templates/footer');
			return;
		}

		$parse = "/CodeIgniter/index.php/videos/view/";
		$data['type'] = explode($parse, parse_url(current_url(), PHP_URL_PATH))[1][1];
		$data['instrument'] = explode($parse, parse_url(current_url(), PHP_URL_PATH))[1][0];

		$user = $this->session->userdata['logged_in']['email'];

		$data['user_id'] = $this->login_database->getUserIDfromemail($user)[0]->id;

		$data['videos'] = $this->login_database->getVideos($data);

		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data["title"] = $page;
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}

}
