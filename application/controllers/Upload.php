<?php

class Upload extends CI_Controller
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

	public function index()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);

		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Signin to view this page!';
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login', $data);
			$this->load->view('templates/footer');
			return;
		}
		$data['logiran'] = isset($this->session->userdata['logged_in']);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/upload',$data);
		$this->load->view('templates/footer');
	}

	public function upload_video()
	{


		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('instrument', 'Instrument', 'trim|required');

		if ($this->form_validation->run() === FALSE) {

			$this->index();

		} else {

			$data = array(
				'title' => $this->input->post('title'),
				'type' => $this->input->post('type'),
				'instrument' => $this->input->post('instrument'),
			);

			$config = [
				'upload_path' => './uploads',
				'allowed_types' => 'avi|mov|mp4',
			];

			$this->load->library('upload', $config);

			$this->form_validation->set_error_delimiters();

			if ($this->upload->do_upload('filename')) {
				$data = $this->input->post();
				$info = $this->upload->data();

				$vid_path = "./uploads/" . $info['raw_name'] . $info['file_ext'];

				$data['location'] = $vid_path;
				$data['u_id'] = $this->session->userdata['logged_in']['username'];
				unset($data['submit']);

				if ($this->login_database->insertvid($data)) {
					$this->index();
				} else {
					$this->index();
				}
			} else {
				$this->index();
			}
		}

	}

	public function leave_comment()
	{

		$user = $this->session->userdata['logged_in']['email'];

		$user_id = $this->login_database->getUserIDfromemail($user)[0]->id;

		$video_id = $this->input->post('video_id');
		$text = $this->input->post('text');

		$comment = $this->login_database->publish_comment($video_id, $user_id, $text);

	}

	public function setLike() {

		$user = $this->session->userdata['logged_in']['email'];

		$user_id = $this->login_database->getUserIDfromemail($user)[0]->id;

		// POST values
		$video_id = $this->input->post('video_id');
		$value = $this->input->post('value');


		$arr = $this->login_database->userRating($user_id, $video_id, $value);

		echo $arr['likes'];
		exit;



	}

	public function setDislike() {

		$user = $this->session->userdata['logged_in']['email'];

		$user_id = $this->login_database->getUserIDfromemail($user)[0]->id;

		// POST values
		$video_id = $this->input->post('video_id');
		$value = $this->input->post('value');

		$arr = $this->login_database->userRating($user_id, $video_id, $value);

		echo $arr['dislikes'];
		exit;



	}

}
