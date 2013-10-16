<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cargar extends CI_Model {

	public function __construct(){

		parent::__construct();

		$this->load->database('default');

	}


	function cargar_a_mysql($data)
	{
      $this->db->trans_begin();
      $this->db->insert('productos',$data);
			if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			}
			else
			{
			    $this->db->trans_commit();
			   
			}
    
     }


     function insert_log($data)
	  {
         $this->db->insert('upload_log',$data);
         $idlog = $this->db->insert_id();
         return $idlog;
      }

      function consulta_xml($id)
      {
      	return $this->db->query("SELECT buenos,malos,total FROM upload_log WHERE id=".$id);
      }

      function consulta_cargados()
      {
      	
      	$query = $this->db->get('upload_log');
      	return($query->num_rows()>0) ? $query->result() : FALSE;

      }
	

}

/* End of file model_cat_categorias.php */
/* Location: ./application/models/model_cat_categorias.php */