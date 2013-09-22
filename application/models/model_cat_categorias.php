<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cat_categorias extends CI_Model {

	public function __construct(){

		parent::__construct();

		$this->load->database('default');
	}


	function traer_categoria( $nombre ){

		$this->db->where('nombre', $nombre);
		$query = $this->db->get('categorias');
		return ( $query->num_rows() > 0 ) ? $query->row_array() : false;
	}


	function edit_categoria( $nombre, $datos ){

		$this->db->where('nombre', $nombre);
		return $this->db->update('categorias', $datos);
	}
	

}

/* End of file model_cat_categorias.php */
/* Location: ./application/models/model_cat_categorias.php */