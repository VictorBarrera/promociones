<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_promociones extends CI_Model {

	function guardar_promocion($data)
	{
		$ok = $this->db->insert('promociones',$data);
	    return($ok)?TRUE:FALSE;
	}

	function get_promociones()
	{
		$query = $this->db->get('promociones');
		return ($query->num_rows() >0)?$query->result():NULL;
	}

}

/* End of file model_promociones.php */
/* Location: ./application/models/model_promociones.php */