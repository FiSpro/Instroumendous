<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('form_validation');


        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News';
               $this->load->view('templates/header', $data);
               $this->load->view('news/index', $data);
               $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                 $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
        }

public function create()
{
    if(!isset($this->session->userdata['logged_in'])){
                $data['message_display'] = 'Signin to view this page!';
                $this->load->view('templates/header');
                $this->load->view('user_authentication/login_form', $data);
                $this->load->view('templates/footer');
                return;
            }
    
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('news/create');
        $this->load->view('templates/footer');

    }
    else
    {
        $this->news_model->set_news();
        $this->load->view('news/success');
    }
}

public function edit($slug)
{

if(!isset($this->session->userdata['logged_in'])){
                $data['message_display'] = 'Signin to view this page!';
                $this->load->view('templates/header');
                $this->load->view('user_authentication/login_form', $data);
                $this->load->view('templates/footer');
                return;
            }


    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Edit news item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');

 $data['news_item'] = $this->news_model->get_news($slug);

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');

    }
    else
    {
$d["title"] = $this->input->post('title');
$d["title"] = $this->input->post('text');

        $this->news_model->update($d, $slug);
        $this->load->view('news/success');
    }
}


public function delete($slug) {
if(!isset($this->session->userdata['logged_in'])){
                $data['message_display'] = 'Signin to view this page!';
                $this->load->view('templates/header');
                $this->load->view('user_authentication/login_form', $data);
                $this->load->view('templates/footer');
                return;
            }

$this->news_model->delete($slug);
}

}
