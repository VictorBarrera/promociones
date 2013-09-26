<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class enviarcorreos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		@session_start();
		if ( !isset( $_SESSION['login'] ) )die('Login required');
		$this->load->model('model_email');
	}




	public function index(){

		$data['page']        = "view_correo";
		$data['promociones'] = $this->model_email->get_promociones();

		$this->load->view('view_plantilla',$data);
	}





	public function sendemail(){

	   $this->load->library('email','','correo');

       $respuesta = array();

       $this->form_validation->set_rules('txt_asunto','Asunto','required');
       $this->form_validation->set_rules('promociones','promociones','required');
       $this->form_validation->set_rules('destinatarios','destinatarios','required');

       $this->form_validation->set_message('required','El campo %s es obligatorio');

       if( $this->form_validation->run() ){

       	   	$idpromocion 	= $this->input->post('promociones');
       	   	$asunto      	= $this->input->post('txt_asunto');
       	   	$categoria   	= $this->input->post('destinatarios');
           	$promo       	= $this->model_email->get_promocion($idpromocion);
           	$promocion      = $promo->descripcion;
           	$todos_enviados = true;

           $correos =  $this->traer_clientes_por_categoria( $categoria );
           	if( $correos == false ){

           		$respuesta['ok']  = FALSE;
				$respuesta['msg'] = "No hay clientes que entren en esta categoria.";

           	}else{

           		foreach ($correos as $valor){
           			
           			$cupon = $this->model_email->get_cupon(rand(1,183675));
           			$this->correo->from('elbaratillo.almacen@gmail.com', 'Almacen el Baratillo'); 
	       			$this->correo->to( $valor['Username'] );
	       			$this->correo->to('rafa.adalberto@gmail.com');
	       			//$this->correo->subject($asunto);
	       			$promocion.=' Su número de cupón es: '.$cupon;
	       			$this->correo->message($promocion);

	       			if( ! $this->correo->send() ){

	       				$todos_enviados = false;
	       			}
           		}

				if( $todos_enviados ){

					$respuesta['ok']  = TRUE;
					$respuesta['msg'] = "Correos enviados con exito";

				}else{

			   		show_error( $this->correo->print_debugger() );

					$respuesta['ok']  = FALSE;
					$respuesta['msg'] = "Error al enviar correos";
				}
           	}

	   }else{

	   		$respuesta['ok']  = FALSE;
	   		$respuesta['msg'] = validation_errors();
	   }

	$this->output->set_content_type('application/json')->set_output( json_encode( $respuesta ) );

	}






	function traer_clientes_por_categoria( $categoria ){

		$this->load->model('model_cat_clientes');
		$this->load->model('model_cat_categorias');

		$clientes  = $this->model_cat_clientes->traer_clientes();
		$categoria = $this->model_cat_categorias->traer_categoria( $categoria );

		if( $clientes == false ){

			return false;

		}else{

			foreach ($clientes as $key => $valor) {
				
				$total_comprado = $this->model_cat_clientes->traer_total_comprado( $valor['Username'] );

				if( ! ( $total_comprado >= $categoria['valor_1'] && $total_comprado <= $categoria['valor_2'] ) ){

					unset( $clientes[ $key ] );
				}
			}
		}

		return $clientes;
	}




}

/* End of file enviarcorreos.php */
/* Location: ./application/controllers/enviarcorreos.php */