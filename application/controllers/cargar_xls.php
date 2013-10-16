<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargar_xls extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_cargar");
    $this->load->helper(array('xml','file','promociones_helper')); 
	}

	public function index()
	{
       	$data['page'] = "view_cargar_xls";
        $data['logs']=$this->model_cargar->consulta_cargados();
		    $this->load->view('view_plantilla',$data);		
	}


	 public function importarExcel(){
    /*.....................xml...............................................*/
    $this->load->dbutil();
    $config = array (
        'root'    => 'Log',
        'element' => 'registro',
        'newline' => "\n",
        'tab'    => "\t"
    );
  // $hoy = date("D-m-Y, g:i:s a"); 
             
    /*......................................................................*/
    	//Cargar PHPExcel library
        $this->load->library('excel');
 
    	$name   = $_FILES['file']['name'];
     	$tname  = $_FILES['file']['tmp_name'];
      $cont_nulos = 0;
      $cont_buenos =0;
      $total =0;
        $obj_excel = PHPExcel_IOFactory::load($tname);       
       	$sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
        /*........................................................................*/
            foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
               $total+=1;
            }}
        /*........................................................................*/
       	$arr_datos = array();
       	foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
              if( $value['A'] == NULL ||  $value['B']==NULL ||  $value['C']==NULL)
              {
                $cont_nulos+=1;
              }
              else
              {
                $arr_datos = array(
                    'descripcion'  => $value['A'],
                    'cantidad'  =>  $value['B'],
                    'precioUnitario'  =>  $value['C'],
                                                        
                ); 
              $cont_buenos+=1;
              }
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
    
     $data["buenos"]=$cont_buenos;
     $data["malos"]=$cont_nulos;
     $data["total"]=$total;
     $data["fecha_carga"] = date('Y-m-d H:i:s');
     $idlog = $this->model_cargar->insert_log($data);  
     //$hoy = date('m-d-Y H:i:s a')."rrrrr";
     $nombrefile = "c:\Dropbox\log_backup.xml"; 
     write_file($nombrefile, $this->dbutil->xml_from_result($this->model_cargar->consulta_xml($idlog),$config));
/*	$this->output
    	     ->set_content_type('application/json')
    	     ->set_output(json_encode($respuesta)); */
    	      echo json_encode(array('status' => $status, 'msg' => $nombrefile));		
    }

}

/* End of file cargar_xls.php */
/* Location: ./application/controllers/cargar_xls.php */