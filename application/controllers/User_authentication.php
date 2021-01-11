<?php
class User_authentication extends CI_Controller {

public function __construct() {
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
public function index() {
    $this->load->view('templates/header');
    $this->load->view('user_authentication/login_form');
    $this->load->view('templates/footer');
}

// Show registration page
public function show() {
    $this->load->view('templates/header');
    $this->load->view('user_authentication/registration_form');
    $this->load->view('templates/footer');
}

// Validate and store registration data in database
public function signup() {

    // Check validation for user input in SignUp form
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/registration_form');
    } else {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $result = $this->login_database->registration_insert($data);
        if ($result == TRUE) {
            $data['message_display'] = 'Registration Successfully !';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('user_authentication/registration_form');
            $this->load->view('templates/footer');
        }
    }
}

// Check for user login process
public function signin() {

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
    );
    $result = $this->login_database->login($data);
    if ($result == TRUE) {

        $username = $this->input->post('username');
        $result = $this->login_database->read_user_information($username);
        if ($result != false) {
            $session_data = array(
                'username' => $result[0]->username
            );
            // Add user data in session
            $data = array('error_message' => 'Signin OK');
            $this->session->set_userdata('logged_in', $session_data);
            //$_SESSION["logged in"]["username"] = ...
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form',$data);
            $this->load->view('templates/footer');
        }
    } else {
        $data = array(
            'error_message' => 'Invalid Username or Password'
        );
        $this->load->view('templates/header');
        $this->load->view('user_authentication/login_form', $data);
        $this->load->view('templates/footer');
    }
}

// Logout from admin page
public function logout() {

    // Removing session data
    $sess_array = array(
        'username' => ''
    );
    $this->session->unset_userdata('logged_in', $sess_array);
    $data['message_display'] = 'Successfully Logout';
    $this->load->view('templates/header');
    $this->load->view('user_authentication/login_form', $data);
    $this->load->view('templates/footer');
}


}