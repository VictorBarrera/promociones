<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafico_logs extends CI_Controller {

	public function index()
	{
		$data['page'] = "view_graficalogs";
		$this->load->view('view_plantilla',$data);	
		
	}

}

/* End of file grafico_logs.php */
/* Location: ./application/controllers/grafico_logs.php */