<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_login extends CI_Model {
 
 function existeUser($user,$pass)
 {
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('usuario',$user);
    $this->db->where('passwd',$pass);
    $query = $this->db->get();
    return ($query->num_rows() >0)?TRUE:FALSE;
 }
	

}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */