<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cat_categorias extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
		$this->load->model('model_cat_categorias');
	}



	public function index(){

		$data['a'] = $this->model_cat_categorias->traer_categoria( 'a' );
		$data['b'] = $this->model_cat_categorias->traer_categoria( 'b' );
		$data['c'] = $this->model_cat_categorias->traer_categoria( 'c' );

		$data['page'] = "view_cat_categorias";

		$this->load->view('view_plantilla',$data);
	}




	function edit_categoria(){

		$data = array();

		$this->form_validation->set_rules('valor_1', 'valor mayor o igual que', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('valor_2', 'valor menor o igual que', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_message('numeric', 'El %s debe ser numérico');
		$this->form_validation->set_message('required', 'El %s es requerido');

		if( $this->form_validation->run() == FALSE ){

			$data['type']    = false;
			$data['message'] = validation_errors();

		}else{

			$categoria = $this->input->post('categoria');

			$datos['valor_1'] = floatval( $this->input->post('valor_1') );
			$datos['valor_2'] = floatval( $this->input->post('valor_2') );

			$change = $this->model_cat_categorias->edit_categoria( $categoria, $datos );

			if( $change == false ){

				$data['type']    = false;
				$data['message'] = 'Error al guardar el detalle.';

			}else{

				$data['type']      = true;
				$data['message']   = 'Detalle guardado';
				$data['categoria'] = $this->model_cat_categorias->traer_categoria( $categoria );

			}
		}

		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) );
	}


	

}

/* End of file cat_categorias.php */
/* Location: ./application/controllers/cat_categorias.php */