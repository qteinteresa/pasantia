<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class cliente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		$this->load->library('form_validation');		
		$this->load->model("cliente_Model");
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
		$config['base_url']        = site_url().'/cliente/cliente/ajax_llamado_Paginacion/'; 		
		$config['total_rows']      = $this->db->get('cliente')->num_rows();
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
						'formulario' =>  $this->cliente_Model->getCliente($config["per_page"], $page),
						'ENCABEZADO'=> 'Listados Clientes:',
                      );
		 return $data;

	}

	public function index()
	{
		# code...
		$_data = array 
		(
			'titulo'     => 'Clientes',//mi titulo 
			'ENCABEZADO' => 'Listados Clientes:',
			"pagi_home"  => "Home",
			"NOTA"       => "Home",
			"pagi1"      => "",
			"pagi2"      => "<li>Listados Clientes</li>",
			"pagi3"      => "",
			"usuario"    => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso')									
		);
		 $this->parser->parse('Index/head.php', $_data, FALSE);	// carga todos las url de estilo i js home	
		 $this->parser->parse('Index/nav_aside.php',$_data , false); // esta seria la barra de navegacion horizontal
		 $this->parser->parse('Index/contenedor.php',$_data,FALSE); // inicio del contenido	  
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('cliente/buscador.php',$data,false);
         $this->parser->parse('cliente/cliente_vista',$data,false);
         $this->load->view('Index/pie.php'); 
	}
	  public function ajax_llamado_Paginacion() 
    {	
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('cliente/cliente_vista',$data,false);


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
			  redirect('/cliente/cliente');
			}
			$config['per_page']   = 8;			
			// $this->db->like('nombre',trim($filter));
			$this->db->limit($config['per_page'],$page);
			$consulta = "SELECT * FROM cliente WHERE nombre LIKE '%".$filter."%' OR apellido LIKE '%".$filter."%' OR fecha_nac LIKE '%".$filter."%' ";
			$query = $this->db->query($consulta);										
			//$query = $this->db->get('cliente');//mi consulta sql
			if ($query->num_rows() > 0) {
			$data = array 
			(

				'formulario'=> $query->result_array(),//variable que guarda el resultado de mi consulta sql
				'ERROR'=> ''
				// 'pagination'=>$this->pagination->create_links(),
			);
			$this->parser->parse('cliente/filtro.php',$data);
			   $this->load->view('Index/pie.php'); 
			
			} else
			{
					 	$data = array 
			(

				'formulario'=> $query->result_array(),
				'ERROR'=> '<h2 class="text-center"><i class="fa fa-exclamation-triangle"></i>No se han encontrado resultados</h2><p class="text-center">Inténta realizar tu búsqueda con palabras más especificas...</p>'
				// 'pagination'=>$this->pagination->create_links(),
				
			);
			$this->parser->parse('cliente/filtro.php',$data);
			   $this->load->view('Index/pie.php'); 
			}		



 }
 ///////////////////////////////////////////////////////////////

	public function add()
	{
		$data = array 
				(
					'titulo'=> 'Clientes',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro Cliente',
					'Encabezado'=> 'Agregar Cliente',//mi titulo 
					"pagi_home"=> "Home",
					"pagi1"=> "",
					"pagi2"=> "<li>Agregar Clientes</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso')			

				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('cliente/cliente_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	}
	public function adding (){
		// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
	  if ($this->form_validation->run('cliente') === FALSE)
	 {
		$data = array 
				(
					'titulo'=> 'Clientes',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro Cliente',
					"pagi_home"=> "Home",
					"pagi1"=> "",
					"pagi2"=> "<li>Agregar Clientes</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
					
					'Encabezado'=> 'Agregar Cliente',//mi titulo 
				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('cliente/cliente_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	 }else{ 

	 	$data = array( 
		'ci'             => $this->input->post('ci',true), // SOLO UN CAMPO
		'nombre'         => $this->input->post('nombre',true), // SOLO UN CAMPO
        'apellido'       => $this->input->post('apellido',true), // SOLO UN CAMPO
		'fecha_nac'      => $this->input->post('fecha_nac',true), // SOLO UN CAMPO
		'direccion'      => $this->input->post('direccion',true), // SOLO UN CAMPO
		'telefono'       => $this->input->post('telefono',true), // SOLO UN CAMPO
		'celular'        => $this->input->post('celular',true), // SOLO UN CAMPO 
		'lugar_trabajo'  => $this->input->post('lugar_trabajo',true), // SOLO UN CAMPO
		'limite_credito' => $this->input->post('limite_credito',true)); // SOLO UN CAMPO
        //ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
	 	$this->cliente_Model->add_cliente($data);		
		//REEDIRECCIONAR 
		redirect('/cliente/cliente/index/');
	
	 }	


	}
	// funcion para editar
	public function edit(){

		$id_cliente    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->cliente_Model->edit($id_cliente);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Clientes',//mi titulo 
			'Encabezado'=> 'Detalle de Clientes', 
			'NOTA'=>'Editar Cliente',
			"pagi_home"=> "Home",
			"pagi1"=> "",
					"pagi2"=> "<li>Editar Clientes</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE); // esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('cliente/cliente_edit.php', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}
	

	}
	// guardar lo editado
	function save_edit(){
						// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('cliente2') === FALSE) {
					$id_cliente = $this->input->post('id_cliente',true);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
					$query = $this->cliente_Model->edit($id_cliente);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
					// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
						$data  = array 
						(
						'titulo'=> 'Clientes',//mi titulo 
						'Encabezado'=> 'Detalle de Clientes', 
						'NOTA'=>'Editar Cliente',
						"pagi_home"=> "Home",
						"pagi1"=> "",
								"pagi2"=> "<li>Editar Clientes</li>",
								"pagi3"=> "",
							"usuario" => $this->session->userdata('usuario'),
							"horaAcceso" => $this->session->userdata('horaAcceso'),	
						
						'formulario'=> $query//variable que guarda el resultado de mi consulta sql
						);		
						$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
						$this->parser->parse('Index/nav_aside.php',$data, FALSE); // esta seria la barra de navegacion horizontal
						$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
						$this->parser->parse('cliente/cliente_edit.php', $data);
						$this->load->view('Index/pie.php'); // pie con los js

			}else{

					// csrgo al array praa enviar al modelo de actualizacion
					$id_cliente = $this->input->post('id_cliente',true);
					$data = array(
						'id_cliente' => $this->input->post('id_cliente',true),
						'ci' => $this->input->post('ci',true),
						'nombre' => $this->input->post('nombre',true),
						
						'apellido' => $this->input->post('apellido',true),
						'fecha_nac' => $this->input->post('fecha_nac',true),
						'direccion' => $this->input->post('direccion',true),
						'telefono' => $this->input->post('telefono',true),
						'celular' => $this->input->post('celular',true),
						'lugar_trabajo' => $this->input->post('lugar_trabajo',true),
						'limite_credito' => $this->input->post('limite_credito',true),
					);			
					$this->cliente_Model->save_edit($id_cliente,$data);
					redirect('/cliente/cliente/index/');
			
		

			}
			

		
	}

	// dar de baja o elminar
	function delete(){
		$id_cliente=$this->uri->segment(4,0);
 		$this->cliente_Model->delete($id_cliente);
		redirect('/cliente/cliente/index/');	
	}

		// cheque si existe ci cliente
	public function check_ci_cliente($ci){
		# code...
		if ($this->cliente_Model->check_ci_cliente($ci)) {
			        
            $this->form_validation->set_message('check_ci_cliente', ''.$ci.' ya fue registrado inserte otro digito');
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

