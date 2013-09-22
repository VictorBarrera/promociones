<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cat_clientes extends CI_Controller {



	public function __construct(){
		
		parent::__construct();
		$this->load->model('model_cat_clientes');
	}




	public function index(){

		$data['clientes'] = $this->model_cat_clientes->traer_clientes();

		if( $data['clientes'] != false ){

			foreach ($data['clientes'] as $key => $valor) {

				$total_comprado = $this->model_cat_clientes->traer_total_comprado( $valor['Username'] );

				if( $total_comprado == false ){

					$data['clientes'][ $key ]['categoria'] = false;

				}else{

					$cliente_c = array( 'desde' => 1, 'hasta' => 100 );
					$cliente_b = array( 'desde' => 101, 'hasta' => 1000 );
					$cliente_a = array( 'desde' => 1001, 'hasta' => 1000000 );

					if( $total_comprado >= $cliente_c['desde'] && $total_comprado <= $cliente_c['hasta'] ){

						$data['clientes'][ $key ]['categoria'] = 'c';

					}else if( $total_comprado >= $cliente_b['desde'] && $total_comprado <= $cliente_b['hasta'] ){

						$data['clientes'][ $key ]['categoria'] = 'b';

					}else if( $total_comprado >= $cliente_a['desde'] && $total_comprado <= $cliente_a['hasta'] ){

						$data['clientes'][ $key ]['categoria'] = 'a';

					}
				}
			}
		}

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