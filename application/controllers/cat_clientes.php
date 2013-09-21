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


	function traer_compras(){

		$data = array();

		$Username = $this->input->post('Username');

		$data['compras'] = $this->model_cat_clientes->traer_compras( $Username );

		if( $data['compras'] == false ){

			$data['type']    = false;
			$data['message'] = 'El cliente no tiene compras';

		}else{

			$data['type'] = true;
		}

		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) );
	}



}

/* End of file cat_clientes.php */
/* Location: ./application/controllers/cat_clientes.php */