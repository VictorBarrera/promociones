<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cat_clientes extends CI_Model {

	public function __construct(){

		parent::__construct();

		$this->load->database('sqlsrv');
	}





	function traer_clientes(){

		$this->db->select('Username');
		$this->db->group_by('Username');
		$query = $this->db->get('Orders');
		return ( $query->num_rows() > 0 ) ? $query->result_array() : false;
	}






	function traer_compras( $Username ){
		$this->db->where('Username', $Username);
		$query = $this->db->get('Orders');
		return ( $query->num_rows() > 0 ) ? $query->result_array() : false;
	}






	function traer_total_comprado( $Username ){

		$compras = $this->traer_compras( $Username );

		if( $compras == false ){

			return 0;

		}else{

			$total = 0;

			foreach ($compras as $campos) {
				
				$total = $total + floatval( $campos['Total'] );
			}

			return $total;
		}
	}

}

/* End of file cat_clientes_model.php */
/* Location: ./application/models/cat_clientes_model.php */