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
					$data['clientes'][ $key ]['color']     = '#FFFFFF';

				}else{

					$this->load->model('model_cat_categorias');

					$cliente_c = $this->model_cat_categorias->traer_categoria( 'c' );

					$cliente_b = $this->model_cat_categorias->traer_categoria( 'b' );
					
					$cliente_a = $this->model_cat_categorias->traer_categoria( 'a' );

					if( $total_comprado >= $cliente_c['valor_1'] && $total_comprado <= $cliente_c['valor_2'] ){

						$data['clientes'][ $key ]['categoria'] = 'c';
						$data['clientes'][ $key ]['color']     = $cliente_c['color'];

					}else if( $total_comprado >= $cliente_b['valor_1'] && $total_comprado <= $cliente_b['valor_2'] ){

						$data['clientes'][ $key ]['categoria'] = 'b';
						$data['clientes'][ $key ]['color']     = $cliente_b['color'];

					}else if( $total_comprado >= $cliente_a['valor_1'] && $total_comprado <= $cliente_a['valor_2'] ){

						$data['clientes'][ $key ]['categoria'] = 'a';
						$data['clientes'][ $key ]['color']     = $cliente_a['color'];

					}else{

						$data['clientes'][ $key ]['categoria'] = false;
						$data['clientes'][ $key ]['color']     = '#FFFFFF';
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