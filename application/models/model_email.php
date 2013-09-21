<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_email extends CI_Model {

function get_promociones()
{
	$query = $this->db->get('promociones');
	return ($query->num_rows()>0)?$query->result():FALSE;
}

function get_promocion($idpromocion)
{
   $this->db->select('descripcion');
   $this->db->where('idpromociones',$idpromocion);
   $query = $this->db->get('promociones');
   return ($query->num_rows()>0) ? $query->row():FALSE;
}
	

}

/* End of file model_email.php */
/* Location: ./application/models/model_email.php */