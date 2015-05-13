<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		$this->load->library('form_validation');
		$this->load->model("Home_model");		
		
		//control de acceso sin login
		// si no esta logueado redirije a login
		if(!$this->session->userdata('id_usuario'))
		{
		redirect('/Login/login/');
		} 


	}

	public	function index()
	{
		

		$data = array //arreglo para mandar datos a la vista
			(
					'titulo'=> 'Inicio',//mi titulo 
					'NOTA'=>'HOME INICIO',
					"pagi_home"=> "Home",
					"pagi1"=> "",
					"pagi2"=> "",
					"pagi3"=> "",
					"stock"=> $this->Home_model->ger_producto_stock(),
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),						
			);
			//redirecionamos a la vista o llamamos a la vista index
			$this->parser->parse('Index/head.php',$data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE); // esta seria la barra de navegacion horizontal
	
			
			$this->parser->parse('Index/contenedor.php',$data, FALSE); // este seria todo el contenido central
			$this->parser->parse('Index/contenedor2.php',$data, FALSE); // este seria todo el contenido central
			$this->load->view('Index/pie.php'); // pie con los js
	

	} 

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */