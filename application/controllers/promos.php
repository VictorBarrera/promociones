<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promos extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//Do your magic here
}
	public function index()
	{
		$data['page']="view_promociones";
		$this->load->view('view_plantilla',$data);
	}

}

/* End of file promociones.php */
/* Location: ./application/controllers/promociones.php */