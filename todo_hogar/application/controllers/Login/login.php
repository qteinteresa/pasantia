<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		$this->load->library('form_validation');
		$this->load->model("Logeo_model");		
	
	}
	//función index hacemos un switch para saber si existe la sesión ,
	public function index()
	{	
		if ($this->session->userdata('id_usuario')=== "") {		
				      
						$data = array //arreglo para mandar datos a la vista
						(
							'titulo'=> 'Login',//mi titulo 
							'nota'=>' '								
						);
						$this->parser->parse('Index/head.php', $data, false);
						$this->parser->parse('login/login_form.php', $data , false);
		}else{
			if ($this->session->userdata('id_usuario')!= ""){
			 redirect(base_url().'index.php/Home/home');
			} else{
				$data = array //arreglo para mandar datos a la vista
						(
							'titulo'=> 'Login',//mi titulo 
							'nota'=>' '								
						);
						$this->parser->parse('Index/head.php', $data, false);
						$this->parser->parse('login/login_form.php', $data , false);
			}

		}
	}


	// Funcion de logeo
	public function logeo()
	{
		    if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
		    {
				// la validacion esta en el la carpeta config
				$this->form_validation->set_error_delimiters('<i class="fa fa-exclamation-triangle"></i>','');
				if ($this->form_validation->run('login') === False)
				{
						$data = array('titulo'=> 'Login');
								$this->parser->parse('Index/head.php', $data, false);
								$this->parser->parse('login/login_form.php', $data , false);

				}else{
			 		 $usser = $this->security->xss_clean(strip_tags( $this->input->post('usuario')));
	          		 $pass  = $this->security->xss_clean(strip_tags( $this->input->post('pass')));
					// conecion con el modelo
	          		 $usuario = $this->Logeo_model->logeo($usser, $pass);
	          		 //
			         if ($usuario == TRUE) 
			         {
			         	$horaAcceso=date('H:i:s');
			            $usuario_data = array(
			               'id_usuario' => $usuario->id_usuario,
			               'usuario' => $usuario->usuario,
			               'horaAcceso'=>$horaAcceso,
			               
			          );
			            $this->session->set_userdata($usuario_data);
						$this->index();
			         } else{
			         	$this->form_validation->set_error_delimiters('<i class="fa fa-exclamation-triangle"></i>','');
							$data = array //arreglo para mandar datos a la vista
								(
									'titulo'=> 'Login',//mi titulo 
									'nota'=>'Datos Introducidos incorrectos'								
								);
								$this->parser->parse('Index/head.php', $data, false);
								$this->parser->parse('login/login_form.php', $data , false);

	           			    }
			        }
			 }

	}

		/**
		* destruye la session actual
		* y devuelve a la vista de login
		* 
		*/
		function logout()
	{
		$this->session->sess_destroy();
		// $this->index();	
		redirect(base_url().'index.php/Login/login');	
	}
	// calback usuario
	 function check_nombre($usuario)
	{

	if ($this->Logeo_model->check_nombre($usuario)) {
			return TRUE;                  
        }
        else
        {            
              $this->form_validation->set_message('check_nombre', 'Usuario Incorrecto');
            return FALSE;
        }
	}
	// calack pss
	 function check_pass($pass)
	{
	if ($this->Logeo_model->check_pass($pass)) {
			return TRUE;
		}else {			        
		            $this->form_validation->set_message('check_pass', 'Contraseña Incorrecta');
		            return FALSE;}

	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */