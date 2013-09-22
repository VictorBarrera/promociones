<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cat_categorias extends CI_Controller {


	public function __construct(){
		parent::__construct();
		
		$this->load->model('model_cat_categorias');
	}



	public function index(){

		$data['a'] = $this->model_cat_categorias->traer_categoria( 'a' );
		$data['b'] = $this->model_cat_categorias->traer_categoria( 'b' );
		$data['c'] = $this->model_cat_categorias->traer_categoria( 'c' );

		$data['page'] = "view_cat_categorias";

		$this->load->view('view_plantilla',$data);
	}

}

/* End of file cat_categorias.php */
/* Location: ./application/controllers/cat_categorias.php */