<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promos extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('model_promociones');
	$this->load->helper('promociones_helper');
}
	public function index()
	{
		$data['promociones']=$this->model_promociones->get_promociones();
		$data['page']="view_promociones";
		$this->load->view('view_plantilla',$data);
	}

	function guardar_promocion()
	{
		$respuesta = array();
		$this->form_validation->set_rules('txt_nombrepromo','nombre promoción','trim|required|xls_clean');
		$this->form_validation->set_rules('descripcion','descripcion','trim|required|xls_clean');
		$this->form_validation->set_rules('txt_vigenciadesde','vigencia desde','trim|required|xls_clean');
		$this->form_validation->set_rules('txt_vigenciahasta','vigencia hasta','trim|required|xls_clean');
		$this->form_validation->set_message('required','El campo %s es necesario');
		if($this->form_validation->run())
		{
			$promocion['nombre_promo']=$this->input->post('txt_nombrepromo');
			$promocion['fecha_desde' ]=fecha_adb($this->input->post('txt_vigenciadesde'));
			$promocion['fecha_hasta' ]=fecha_adb($this->input->post('txt_vigenciahasta'));
			$promocion['descripcion' ]=$this->input->post('descripcion');
			$ok = $this->model_promociones->guardar_promocion($promocion);
			if($ok)
			{
			  $respuesta['ok']=true;
			  $respuesta['msg']='promoción guardada';
			}
			else
			{
			  $respuesta['ok']=true;
			  $respuesta['msg']='promoción guardada';
			}
           
		}
		else
		{
           $respuesta['ok']=false;
           $respuesta['msg']=validation_errors();
		}
       $this->output->set_content_type('application/json')->set_output( json_encode( $respuesta ) );
	}

}

/* End of file promociones.php */
/* Location: ./application/controllers/promociones.php */