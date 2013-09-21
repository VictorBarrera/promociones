<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cat_clientes extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('model_cat_clientes');
	}

	public function index(){

		$data['clientes'] = $this->model_cat_clientes->traer_clientes();

		$data['page'] = "view_cat_clientes";
		$this->load->view('view_plantilla',$data);
	}



}

/* End of file cat_clientes.php */
/* Location: ./application/controllers/cat_clientes.php */