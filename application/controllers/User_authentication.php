<?php

class User_authentication extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url_helper');

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');


	}

	// Show login page
	public function index()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$this->load->view('templates/header', $data);
		$this->load->view('user_authentication/login');
		$this->load->view('templates/footer');
	}

	// Show registration page
	public function show()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$this->load->view('templates/header', $data);
		$this->load->view('user_authentication/register');
		$this->load->view('templates/footer');
	}


	// Validate and store registration data in database
	public function signup()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['logiran'] = isset($this->session->userdata['logged_in']);

			$this->load->view('templates/header',$data);
			$this->load->view('user_authentication/register');
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email_value'),
				'password' => $this->input->post('password')
			);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['logiran'] = isset($this->session->userdata['logged_in']);

				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('templates/header',$data);
				$this->load->view('user_authentication/login', $data);
				$this->load->view('templates/footer');
			} else {
				$data['logiran'] = isset($this->session->userdata['logged_in']);
				$data['message_display'] = 'Email already in system!';
				$this->load->view('templates/header',$data);
				$this->load->view('user_authentication/register');
				$this->load->view('templates/footer');
			}
		}
	}

	public function admin()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);

		if (isset($this->session->userdata['logged_in'])) {
			$data['name'] = $this->session->userdata['logged_in']['name'];
			$data['surname'] = $this->session->userdata['logged_in']['surname'];
			$data['email'] = $this->session->userdata['logged_in']['email'];

			$data['logiran'] = isset($this->session->userdata['logged_in']);
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/admin_page', $data);
			$this->load->view('templates/footer');
		} else {
			$data['message_display'] = 'Signin to view admin page!';
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login', $data);
			$this->load->view('templates/footer');
		}
	}

	// Check for user login process
	public function signin()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$result = $this->login_database->login($data);
		if ($result == TRUE) {

			$email = $this->input->post('email');
			$result = $this->login_database->read_user_information($email);
			if ($result != false) {
				$session_data = array(
					'username' => $result[0]->username,
					'email' => $result[0]->email,
				);
				// Add user data in session
				$data = array('error_message' => 'Signin OK');
				$this->session->set_userdata('logged_in', $session_data);
				$data['logiran'] = isset($this->session->userdata['logged_in']);

				$pass['username'] = $result[0]->username;
				$this->load->view('templates/header', $data);
				$this->load->view('user_authentication/welcome_page', ['pass' => $pass]);
				$this->load->view('templates/footer');
			}
		} else {
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$data['logiran'] = isset($this->session->userdata['logged_in']);

			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login', $data);
			$this->load->view('templates/footer');
		}
	}

	// Logout from admin page
	public function logout()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('templates/header', $data);
		$this->load->view('user_authentication/login', $data);
		$this->load->view('templates/footer');
	}

}
