<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cat_clientes extends CI_Model {

	public function __construct(){

		parent::__construct();

		$this->load->database('sqlsrv');
	}


	function traer_clientes(){

		$this->db->select('Username, FirstName, LastName, Address, City, Email');
		$this->db->group_by('Username, FirstName, LastName, Address, City, Email');
		$query = $this->db->get('Orders');
		return ( $query->num_rows() > 0 ) ? $query->result_array() : false;
	}

}

/* End of file cat_clientes_model.php */
/* Location: ./application/models/cat_clientes_model.php */