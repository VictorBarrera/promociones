<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}

	public function index()
	{
		$this->load->view('view_login');
	}

	function loguear()
	{
        $respuesta = array();
		$user = $this->input->post('user');
		$pass = $this->input->post('passwd');
		$ok = $this->model_login->existeUser($user,$pass);
		if($ok)
		 {
		 	$respuesta['ok']=true;
		 	$respuesta['msg']='Todo bien';
            $_SESSION['login']='ok';
            $_SESSION['user']=$user;
          //  redirect('home');
            $this->output->set_content_type('application/json')->set_output( json_encode( $respuesta ) );
		 }
        else
         {
           $respuesta['ok']=false;
         }

       $this->output->set_content_type('application/json')->set_output( json_encode( $respuesta ) );
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */