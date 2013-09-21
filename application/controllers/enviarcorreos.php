<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class enviarcorreos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		@session_start();
		if ( !isset( $_SESSION['login'] ) ) die('Login required');
		$this->load->model('model_email');
	}

	public function index()
	{
		$data['page']="view_correo";
		$data['promociones'] = $this->model_email->get_promociones();
		$this->load->view('view_plantilla',$data);
	}

	public function sendemail()
	{
	   $this->load->library('email','','correo');
       $respuesta = array();
       $this->form_validation->set_rules('txt_asunto','Asunto','required');
       $this->form_validation->set_rules('promociones','promociones','required');
       $this->form_validation->set_message('required','El campo %s es obligatorio');
       if($this->form_validation->run())
       {
       	   $idpromocion = $this->input->post('promociones');
       	   $asunto = $this->input->post('txt_asunto');
           $promo = $this->model_email->get_promocion($idpromocion);
           $promocion = $promo->descripcion;
		   $this->correo->from('rafa.adalberto@gmail.com', 'Rafa'); 
	       $this->correo->to('rafa.adalberto@gmail.com');
	       $this->correo->subject($asunto);
	       $this->correo->message($promocion);
			if($this->correo->send())
			  {
			    $respuesta['ok']=TRUE;
			    $respuesta['msg']="Correos enviados con exito";
			  }
			  else
			  {
			   show_error($this->correo->print_debugger());
			   $respuesta['ok']=FALSE;
			   $respuesta['msg']="Error al enviar correo";
			  }
	   }
	   else
	   {
	   	$respuesta['ok']=FALSE;
	   	$respuesta['msg']= validation_errors();
	   }
	$this->output->set_content_type('application/json')->set_output( json_encode( $respuesta) );

	}

}

/* End of file enviarcorreos.php */
/* Location: ./application/controllers/enviarcorreos.php */