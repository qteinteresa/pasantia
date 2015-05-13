<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class empleado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		
	///  no se si deberia cargar empleado y proveedor, puse porque esta el de pais alli. jejje cristiaaaaann
		$this->load->library('form_validation');		
		$this->load->model("empleado_Model");
				//control de acceso sin login
		// si no esta logueado redirije a login
		if(!$this->session->userdata('id_usuario'))
		{
		redirect('/Login/login/');
		} 

		
	}
			// Vista y paginacion
	public function pagination_code(){
	  $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        if(!is_numeric($page)){$page = 0;}            
		///////////////////////////////////////////////////////////////////
		///////////////////////////paginando//////////////////////////////
		$config                    = array();
		$config['base_url']        = site_url().'/empleado/empleado/ajax_llamado_Paginacion/'; 		
		$config['total_rows']      = $this->db->get('empleado')->num_rows();
		$config['per_page']        = 7;
		$config['uri_segment']     = 4;	
		$config['next_link']       = 'Siguiente';
		$config['next_tag_open']   = '<li  class="active">';
		$config['next_tag_close']  = '</li>';        
		$config['prev_link']       = 'Anterior';
		$config['prev_tag_open']   = '<li  class="active">';
		$config['prev_tag_close']  = '</li>';        
		$config['first_link']      = 'Primero';
		$config['first_tag_open']  = '<li  class="active">';
		$config['first_tag_close'] = '</li><i class="fa fa-angle-double-left"></i>';
		$config['last_link']       = 'Ultimo';
		$config['last_tag_open']   = '<li class="active"> <i class="fa fa-angle-double-right"></i>';
		$config['last_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li class="active">';
		$config['num_tag_close']   = '</li>';
		$config['full_tag_open']   = '<ul class="pagination_class">';
		$config['full_tag_close']  = '</ul>';
		$this->pagination->initialize($config);
		//////////////////////////////////////////////////////////////////
		$data = array(
						'pagination' => $this->pagination->create_links(),						
						'formulario' =>  $this->empleado_Model->getEmpleado($config["per_page"], $page),
						'ENCABEZADO'=> 'Listados Empleado:',
                      );
		 return $data;

	}

	public function index()
	{
		# code...
		$_data = array 
		(
			'titulo'     => 'Empleado',//mi titulo 
			'ENCABEZADO' => 'Listados Empleado:',
			"pagi_home"  => "Home",
			"NOTA"       => "Home",
			"pagi1"      => "",
			"pagi2"      => "<li>Listados Empleado</li>",
			"pagi3"      => "",
			"usuario"    => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso')									
		);
		 $this->parser->parse('Index/head.php', $_data, FALSE);	// carga todos las url de estilo i js home	
		 $this->parser->parse('Index/nav_aside.php',$_data , false); // esta seria la barra de navegacion horizontal
		 $this->parser->parse('Index/contenedor.php',$_data,FALSE); // inicio del contenido	  
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
            $this->parser->parse('empleado/buscador.php',$data,false);
         $this->parser->parse('empleado/empleado_vista',$data,false);
         $this->load->view('Index/pie.php'); 
	}
	  public function ajax_llamado_Paginacion() 
    {	 
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('empleado/empleado_vista',$data,false);



    }
	/////////////////////////buscado filtro///////////////
		public function buscador()
	{
				$config['uri_segment'] = 5;
			if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
				{
				   $page=$this->input->post('page');
				   $filter=$this->input->post('filter'); 			
				}
				else
				{ 
				  $page=$this->uri->segment(5,0);			  
				  $filter=$this->uri->segment(4,0);			 
				}
			if (0 == strcmp($filter, " "))
				{ 
				  redirect('/empleado/empleado/index');
				}
				$config['per_page']   = 8;			
				$this->db->like('nombre',trim($filter));
				$this->db->limit($config['per_page'],$page);
				$consulta = "SELECT * FROM empleado WHERE nombre LIKE '%".$filter."%' OR apellido LIKE '%".$filter."%' OR ci LIKE '%".$filter."%' ";
				$query = $this->db->query($consulta);										
				//$query = $this->db->get('empleado');//mi consulta sql
				if ($query->num_rows() > 0) {
				$data = array 
				(

					'formulario'=> $query->result_array(),//variable que guarda el resultado de mi consulta sql
					'ERROR'=> ''
					// 'pagination'=>$this->pagination->create_links(),
				);
				$this->parser->parse('empleado/filtro.php',$data);
				  
				
				} else
				{
						 	$data = array 
				(

					'formulario'=> $query->result_array(),
					'ERROR'=> '<h2 class="text-center"><i class="fa fa-exclamation-triangle"></i>No se han encontrado resultados</h2><p class="text-center">Inténta realizar tu búsqueda con palabras más especificas...</p>'
					// 'pagination'=>$this->pagination->create_links(),
					
				);
				$this->parser->parse('empleado/filtro.php',$data);
				 
				}		



	 }
 ///////////////////////////////////////////////////////////////
	public function add()
	{
		$data = array 
				(
					'titulo'=> 'Todo Hogar',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro empleado',
					'Encabezado'=> 'Agregar empleado',//mi titulo 
					"pagi_home"=> "Home",
					"pagi1"=> "",
					"pagi2"=> "<li>Agregar Empleado</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
					
			
			

				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('empleado/empleado_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	}
	public function adding (){
		// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('empleado') === False)
			{  	
					 	$data = array 
						(
							'titulo'     => 'Todo Hogar',//mi titulo 
							'error'      => '',//mi titulo
							'NOTA'       =>'Registro empleado',
							"pagi_home"  => "Home",
							"pagi1"      => "",
							"pagi2"      => "<li>Agregar Empleado</li>",
							"pagi3"      => "",
							"usuario"    => $this->session->userdata('usuario'),
							"horaAcceso" => $this->session->userdata('horaAcceso'),					
							'Encabezado' => 'Agregar empleado',//mi titulo 
						);	
				$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
				$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
				$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
				$this->parser->parse('empleado/empleado_add.php', $data);
				$this->load->view('Index/pie.php'); // pie con los js
			} else{			

					 $ci= $this->input->post('cedula'); // SOLO UN CAMPO
					 $nombre_empleado = $this->input->post('nombre_empleado',true); // SOLO UN CAMPO        
					 $apellido_empleado = $this->input->post('apellido_empleado',true); // SOLO UN CAMPO
					 $direccion = $this->input->post('direccion',true); // SOLO UN CAMPO
					 $telefono = $this->input->post('telefono',true); // SOLO UN CAMPO
					 $sueldo = $this->input->post('sueldo',true); // SOLO UN CAMPO
					 $cargo = $this->input->post('cargo',true); // SOLO UN CAMPO
					  
					  //ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
				 		$this->empleado_Model->add_empleado($ci,$nombre_empleado,$apellido_empleado,$direccion,$telefono,$sueldo,$cargo);		
					//REEDIRECCIONAR 
					redirect('/empleado/empleado/index/');
			}


	}
	public function adding2 (){
		// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('emple_user') === False)
			{  	
					 	$data = array 
						(
							'titulo'     => 'Todo Hogar',//mi titulo 
							'error'      => '',//mi titulo
							'NOTA'       =>'Registro empleado',
							"pagi_home"  => "Home",
							"pagi1"      => "",
							"pagi2"      => "<li>Agregar Empleado</li>",
							"pagi3"      => "",
							"usuario"    => $this->session->userdata('usuario'),
							"horaAcceso" => $this->session->userdata('horaAcceso'),					
							'Encabezado' => 'Agregar empleado',//mi titulo 
						);	
				$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
				$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
				$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
				$this->parser->parse('empleado/empleado_add.php', $data);
				$this->load->view('Index/pie.php'); // pie con los js
			} else{			
				
					 $ci= $this->input->post('cedula'); // SOLO UN CAMPO
					 $nombre_empleado = $this->input->post('nombre_empleado',true); // SOLO UN CAMPO        
					 $apellido_empleado = $this->input->post('apellido_empleado',true); // SOLO UN CAMPO
					 $direccion = $this->input->post('direccion',true); // SOLO UN CAMPO
					 $telefono = $this->input->post('telefono',true); // SOLO UN CAMPO
					 $sueldo = $this->input->post('sueldo',true); // SOLO UN CAMPO
					 $cargo = $this->input->post('cargo',true); // SOLO UN CAMPO
					  
					  //ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
				 	$this->empleado_Model->add_empleado($ci,$nombre_empleado,$apellido_empleado,$direccion,$telefono,$sueldo,$cargo);
				 	/////////////////////////////////////////////////	
				$id_empleado = $this->	ultimo_empleado();//octengo el ultimo id del empleado
		         $_data = array(	
									'usuario'  => $this->input->post('usuario',TRUE),
									'pass'         => $this->input->post('pass',TRUE),
									'id_empleado'   => $id_empleado ,
		         				
		          );
		         $this->empleado_Model->add_user($_data);	
					//REEDIRECCIONAR 
					redirect('/empleado/empleado/index/');
					
			}


	}
		///funcion ultimo producto para guardar el id_roducto
	
	function ultimo_empleado()
	{
		$query = $this->db->query('SELECT MAX(id_empleado) as id_empleado from empleado');
	 	foreach($query->result_array() as $d)
	 	{
			return( $d['id_empleado']);
	 	}
	}
	// funcion para editar
	public function edit(){

		$id    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->empleado_Model->edit($id);
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != true){
			$id2   = $this->uri->segment(4,0);
			$consulta = $this->empleado_Model->edit_empleado($id2);
				$data  = array 
					(
					'titulo'     => 'Todo Hogar',//mi titulo 
					'Encabezado' => 'Detalle de Registros', 
					'NOTA'       =>'Editar Registro',
					"pagi_home"  => "Home",
					"pagi1"      => "",
					"pagi2"      => "<li>Editar Empleado</li>",
					"pagi3"      => "",
					"usuario"    => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),				
					'formulario'=> $consulta//variable que guarda el resultado de mi consulta sql
					);		
					$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
					$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
					$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
					$this->parser->parse('empleado/empleado_edit.php', $data);
					$this->load->view('Index/pie.php'); // pie con los js
		}else{
			$id    = $this->uri->segment(4,0);
			$consulta = $this->empleado_Model->edit_empleado_user($id);
				$data  = array 
					(
					'titulo'     => 'Todo Hogar',//mi titulo 
					'Encabezado' => 'Detalle de Registros', 
					'NOTA'       =>'Editar Registro',
					"pagi_home"  => "Home",
					"pagi1"      => "",
					"pagi2"      => "<li>Editar Empleado</li>",
					"pagi3"      => "",
					"usuario"    => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),				
					'formulario'=> $consulta//variable que guarda el resultado de mi consulta sql
					);		
					$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
					$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
					$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
					$this->parser->parse('empleado/empleado_user_edit.php', $data);
					$this->load->view('Index/pie.php'); // pie con los js
		}

	}
	// guardar lo editado
	function save_edit(){
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('empleado2') === False)
			 {  
			// cargo al array praa enviar al modelo de actualizacion
			$id2   = $this->input->post('id_empleado',true);
			$consulta = $this->empleado_Model->edit_empleado($id2);
				$data  = array 
					(
					'titulo'     => 'Todo Hogar',//mi titulo 
					'Encabezado' => 'Detalle de Registros', 
					'NOTA'       =>'Editar Registro',
					"pagi_home"  => "Home",
					"pagi1"      => "",
					"pagi2"      => "<li>Editar Empleado</li>",
					"pagi3"      => "",
					"usuario"    => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),				
					'formulario'=> $consulta//variable que guarda el resultado de mi consulta sql
					);		
					$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
					$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
					$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
					$this->parser->parse('empleado/empleado_edit.php', $data);
					$this->load->view('Index/pie.php'); // pie con los js
					} else{
							$id = $this->input->post('id_empleado',true);
								$data = array(
									'ci' => $this->input->post('cedula',true),
									'nombre' => $this->input->post('nombre_empleado',true),
									'apellido' => $this->input->post('apellido_empleado',true),
									'direccion' => $this->input->post('direccion',true),
									'telefono' => $this->input->post('telefono',true),
									'sueldo' => $this->input->post('sueldo',true),
									'cargo' => $this->input->post('cargo',true),
								);			
							
								$this->empleado_Model->save_edit($id,$data);
								redirect('/empleado/empleado/index/');
					}
		
	}
		// guardar lo editado
	function save_edit2(){
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('emple_user2') === false)
			 {  

			$id    = $this->input->post('id_empleado',true);// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
			$consulta = $this->empleado_Model->edit_empleado_user($id);
				$data  = array 
					(
					'titulo'     => 'Todo Hogar',//mi titulo 
					'Encabezado' => 'Detalle de Registros', 
					'NOTA'       =>'Editar Registro',
					"pagi_home"  => "Home",
					"pagi1"      => "",
					"pagi2"      => "<li>Editar Empleado</li>",
					"pagi3"      => "",
					"usuario"    => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),				
					'formulario'=> $consulta//variable que guarda el resultado de mi consulta sql
					);		
					$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
					$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
					$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
					$this->parser->parse('empleado/empleado_user_edit.php', $data);
					$this->load->view('Index/pie.php'); // pie con los js
				}else{
					// cargo al array praa enviar al modelo de actualizacion
					$id = $this->input->post('id_empleado',true);
					$data = array(
						'ci' => $this->input->post('cedula',true),
						'nombre' => $this->input->post('nombre_empleado',true),
						'apellido' => $this->input->post('apellido_empleado',true),
						'direccion' => $this->input->post('direccion',true),
						'telefono' => $this->input->post('telefono',true),
						'sueldo' => $this->input->post('sueldo',true),
						'cargo' => $this->input->post('cargo',true),
					);			
					
					$this->empleado_Model->save_edit($id,$data);
					$id2 = $this->input->post('id_usuario',true);
					 $_data = array(	
											'usuario'  => $this->input->post('usuario',TRUE),
											'pass'         => $this->input->post('pass',TRUE),
											'id_empleado'   => $this->input->post('id_empleado',true),
				         				
				          );
				         $this->empleado_Model->save_user($id2,$_data);	
					redirect('/empleado/empleado/index/');
				}
		
	}


	// dar de baja o elminar
	function delete(){
		$id = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->empleado_Model->edit($id);
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != true){
		$id=$this->uri->segment(4,0);
 		$this->empleado_Model->delete($id);
		redirect('/empleado/empleado/index/');	
		}else{
			$id=$this->uri->segment(4,0);
 			$this->empleado_Model->delete_user($id);
 			$this->empleado_Model->delete($id);
 			redirect('/empleado/empleado/index/');	


		}
	}
	// cheque si existe codigo Cedula 
	function check_ci($ci){
		# code...
		if ($this->empleado_Model->check_ci($ci)) {
			        
            $this->form_validation->set_message('check_ci', ''.$ci.' ya fue registrado inserte otro digito');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}
		// cheque si existe codigo Usuario 
	function check_usuario($usuario){
		# code...
		if ($this->empleado_Model->check_usuario($usuario)) {
			        
            $this->form_validation->set_message('check_usuario', ''.$usuario.'No esta Disponible');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}


}

/* End of file pais.php */
/* Location: ./application/controllers/pais.php */




