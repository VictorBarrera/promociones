<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargar_xls extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_cargar");
	}

	public function index()
	{
       	$data['page'] = "view_cargar_xls";
		$this->load->view('view_plantilla',$data);		
	}


	 public function importarExcel(){
    	//Cargar PHPExcel library
        $this->load->library('excel');
 
    	$name   = $_FILES['file']['name'];
     	$tname  = $_FILES['file']['tmp_name'];
 
        $obj_excel = PHPExcel_IOFactory::load($tname);       
       	$sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
 
       	$arr_datos = array();
       	foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
                $arr_datos = array(
                    'descripcion'  => $value['A'],
                    'cantidad'  =>  $value['B'],
                    'precioUnitario'  =>  $value['C'],
                                                        
                ); 
		foreach ($arr_datos as $llave => $valor) {
			$arr_datos[$llave] = $valor;
		}
		$this->model_cargar->cargar_a_mysql($arr_datos);	
            } 
       	}
       //	$respuesta['status'] = "success";
	  //  $respuesta['msg'] = 'Datos Cargados correctamente';
	  $status = "success";
	  $msg = "Todo bien";
 
/*	$this->output
    	     ->set_content_type('application/json')
    	     ->set_output(json_encode($respuesta)); */
    	      echo json_encode(array('status' => $status, 'msg' => $msg));		
    }

}

/* End of file cargar_xls.php */
/* Location: ./application/controllers/cargar_xls.php */