<?php
class Pages extends CI_Controller {

<<<<<<< HEAD
	public function view($page)
	{
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');

		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data["title"] = $page;
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$this->load->view('templates/header',$data);
		$this->load->view('pages/'. $page);
		$this->load->view('templates/footer');
	}


}
=======
        public function view($page = 'home')
        {
           $this->load->helper('url_helper');
         

if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
