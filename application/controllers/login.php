<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html','security'));
		$this->load->library(array('session','form_validation'));
		$this->load->database();
		$this->load->model('user_model');
	}

	function index()
	{
		//get form input
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		//form validation
		$this->form_validation->set_rules('email','Email-ID','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			//validation fail
			$this->load->view('login_view');
		}
		else
		{
			//check user credentials
			$uresult = $this->user_model->get_user($email, $password);
			if(count($uresult)>0)
			{
				//set session
				$sess_data = array('login' => TRUE, 'uname' => $uresult[0]->fname,'uid' => $uresult[0]->id);
				$this->session->set_userdata($sess_data);
				$this->load->view('profile_view');
			}
			else
			{
				$this->session->set_flashdata('msg','<div class = "alert alert-danger text-center">Wrong Email/Password</div>');
				$this->load->view('login_view');
			}
		}
	}
}

?>