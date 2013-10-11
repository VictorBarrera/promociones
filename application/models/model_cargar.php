<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cargar extends CI_Model {

	public function __construct(){

		parent::__construct();

		$this->load->database('default');
	}


	function cargar_a_mysql($data)
	{
      $this->db->insert('productos',$data);
	}
	

}

/* End of file model_cat_categorias.php */
/* Location: ./application/models/model_cat_categorias.php */