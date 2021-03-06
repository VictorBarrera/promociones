<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_email extends CI_Model {

	public function __construct(){

		parent::__construct();

		$this->load->database('default');
	}

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

function get_cupon($idcupon)
{
	$this->db->select('codigo');
	$this->db->where('idcupon',$idcupon);
	$query = $this->db->get('cupones');
	if($query->num_rows()>0)
	{
		$r = $query->row();
		$cupon = $r->codigo;
		return $cupon;
	} 
	else
	{
		return FALSE;
	}
}
	

}

/* End of file model_email.php */
/* Location: ./application/models/model_email.php */