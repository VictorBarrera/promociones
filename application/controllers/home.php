<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//session_start();
		if ( !isset( $_SESSION['login'] ) ) die('Login required');
	}

	public function index()
	{
		$data['page']="view_home";
		$this->load->view('view_plantilla',$data);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */