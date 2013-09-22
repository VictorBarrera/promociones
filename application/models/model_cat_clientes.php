<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cat_clientes extends CI_Model {

	protected $sqlsrv = '';

	public function __construct(){

		parent::__construct();

		$this->sqlsrv = $this->load->database('sqlsrv', TRUE);
	}





	function traer_clientes(){

		$DB = $this->sqlsrv;

		$DB->select('Username');
		$DB->group_by('Username');
		$query = $DB->get('Orders');
		return ( $query->num_rows() > 0 ) ? $query->result_array() : false;
	}






	function traer_compras( $Username ){

		$DB = $this->sqlsrv;

		$DB->where('Username', $Username);
		$query = $DB->get('Orders');
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