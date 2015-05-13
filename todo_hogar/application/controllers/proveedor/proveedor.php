<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class proveedor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		$this->load->library('form_validation');		
		$this->load->model("proveedor_Model");
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
		$config['base_url']        = site_url().'/proveedor/proveedor/ajax_llamado_Paginacion/'; 		
		$config['total_rows']      = $this->db->get('proveedor')->num_rows();
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
						'formulario' =>  $this->proveedor_Model->getProveedor($config["per_page"], $page),
						'ENCABEZADO'=> 'Listados Empleado:',
                      );
		 return $data;

	}

	public function index()
	{
		# code...
		$_data = array 
		(
			'titulo'     => 'Proveedor',//mi titulo 
			'ENCABEZADO' => 'Listados Proveedor:',
			"pagi_home"  => "Home",
			"NOTA"       => "Home",
			"pagi1"      => "",
			"pagi2"      => "<li>Listados Proveedor</li>",
			"pagi3"      => "",
			"usuario"    => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso')									
		);
		 $this->parser->parse('Index/head.php', $_data, FALSE);	// carga todos las url de estilo i js home	
		 $this->parser->parse('Index/nav_aside.php',$_data , false); // esta seria la barra de navegacion horizontal
		 $this->parser->parse('Index/contenedor.php',$_data,FALSE); // inicio del contenido	  
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
          $this->parser->parse('proveedor/buscador.php',$data,false);
         $this->parser->parse('proveedor/proveedor_vista',$data,false);
         $this->load->view('Index/pie.php'); 
	}
	  public function ajax_llamado_Paginacion() 
    {	$_data = array 
		(
			'titulo'     => 'Proveedor',//mi titulo 			
			"pagi_home"  => "Home",
			"NOTA"       => "Home",
			"pagi1"      => "",
			"pagi2"      => "<li>Listados Proveedor</li>",
			"pagi3"      => "",
			"usuario"    => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso')									
		);
		
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('proveedor/proveedor_vista',$data,false);
    

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
				  redirect('/proveedor/proveedor');
				}
				$config['per_page']   = 8;			
				$this->db->like('nombre',trim($filter));
				$this->db->limit($config['per_page'],$page);
				$consulta = "SELECT * FROM proveedor WHERE razon_social LIKE '%".$filter."%' OR ruc LIKE '%".$filter."%'  ";
				$query = $this->db->query($consulta);										
				//$query = $this->db->get('proveedor');//mi consulta sql
				if ($query->num_rows() > 0) {
				$data = array 
				(

					'formulario'=> $query->result_array(),//variable que guarda el resultado de mi consulta sql
					'ERROR'=> ''
					// 'pagination'=>$this->pagination->create_links(),
				);
				$this->parser->parse('proveedor/filtro.php',$data);
	
				
				} else
				{
						 	$data = array 
				(

					'formulario'=> $query->result_array(),
					'ERROR'=> '<h2 class="text-center"><i class="fa fa-exclamation-triangle"></i>No se han encontrado resultados</h2><p class="text-center">Inténta realizar tu búsqueda con palabras más especificas...</p>'
					// 'pagination'=>$this->pagination->create_links(),
					
				);
				$this->parser->parse('proveedor/filtro.php',$data);
			
				}		



	 }
	 ///////////////////////////////////////////////////////////////
	public function add()
	{
		$data = array 
				(
					'titulo'=> 'Todo Hogar',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro de Proveedor',
					'Encabezado'=> 'Agregar Proveedor',//mi titulo 
					"pagi_home"=> "Home",

					"pagi1"=> "",
					"pagi2"=> "<li>Agregar Proveedor</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	

				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('proveedor/proveedor_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	}
	public function adding (){
		// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('proveedor') === False)
	 {  
		$data = array 
				(
					'titulo'     => 'Todo Hogar',//mi titulo 
					'error'      => '',//mi titulo
					'NOTA'       =>'Registro de Proveedor',
					"pagi_home"  => "Home",
					"pagi1"      => "",
					"pagi2"      => "<li>Agregar Proveedor</li>",
					"pagi3"      => "",
					"usuario"    => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	
					
					'Encabezado' => 'Agregar Proveedor',//mi titulo 
				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('proveedor/proveedor_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
		
	
	 }	
	 else // SI NO PASA LA VALIDATION 
	 {
		if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
		{
		$ruc	            = $this->input->post('ruc',true); // SOLO UN CAMPO
		$razon_social 	    = $this->input->post('razon_social',true); // SOLO UN CAMPO
        $direccion 	        = $this->input->post('direccion',true); // SOLO UN CAMPO
		$telefono 	        = $this->input->post('telefono',true); // SOLO UN CAMPO
		$mail 	            = $this->input->post('mail',true); // SOLO UN CAMPO
		$pag_web 	        = $this->input->post('pag_web',true); // SOLO UN CAMPO
		$cuenta_bancaria 	= $this->input->post('cuenta_bancaria',true); // SOLO UN CAMPO 
		$vendedor 	        = $this->input->post('vendedor',true); // SOLO UN CAMPO
		$limite_credito 	= $this->input->post('limite_credito',true); // SOLO UN CAMPO
		  //ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
	 		$this->proveedor_Model->add_proveedor($id_proveedor,$ruc,$razon_social,$direccion,$telefono,$mail,$pag_web,$cuenta_bancaria,$vendedor,$limite_credito);		
		//REEDIRECCIONAR 
		redirect('/proveedor/proveedor/index/');
		}else{}
	 }


	}
	// funcion para editar
	public function edit(){

		$id_proveedor    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->proveedor_Model->edit($id_proveedor);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Todo Hogar',//mi titulo 
			'Encabezado'=> 'Detalle de Registros', 
			'NOTA'=>'Editar Registro',
			"pagi_home"=> "Home",
					"pagi1"=> "",
					"pagi2"=> "<li>Editar Proveedor</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('proveedor/proveedor_edit.php', $data);
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
		if ($this->form_validation->run('proveedor2') === False)
	 {  

	 	$id_proveedor = $this->input->get('id_proveedor',true);
			$query = $this->proveedor_Model->edit($id_proveedor);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Todo Hogar',//mi titulo 
			'Encabezado'=> 'Detalle de Registros', 
			"pagi_home"=> "Home",
					"pagi1"=> "",
					"pagi2"=> "<li>Editar Proveedor</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			
			'NOTA'=>'Editar Registro',
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('proveedor/proveedor_edit.php', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}



	 }else{
			
			if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
		{
			// cargo al array praa enviar al modelo de actualizacion
			$id_proveedor = $this->input->post('id_proveedor',true);
			$data = array(
				'id_proveedor'    => $this->input->post('id_proveedor',true),
				'ruc'             => $this->input->post('ruc',true),
				'razon_social'    => $this->input->post('razon_social',true),				
				'direccion'       => $this->input->post('direccion',true),
				'telefono'        => $this->input->post('telefono',true),
				'mail'            => $this->input->post('mail',true),
				'pag_web'         => $this->input->post('pag_web',true),
				'cuenta_bancaria' => $this->input->post('cuenta_bancaria',true),
				'vendedor'        => $this->input->post('vendedor',true),
				'limite_credito'  => $this->input->post('limite_credito',true),
			);			
			$this->proveedor_Model->save_edit($id_proveedor,$data);
			redirect('/proveedor/proveedor/index/');	

		}else{}
		
	}

 }

	// dar de baja o elminar
	function delete(){
		$id=$this->uri->segment(4,0);
 		$this->proveedor_Model->delete($id);
		redirect('/proveedor/proveedor/index/');	
	}
		// cheque si existe codigo brra 
	function check_ruc($ruc){
		# code...
		if ($this->proveedor_Model->check_ruc($ruc)) {
			        
            $this->form_validation->set_message('check_ruc', ''.$ruc.' ya fue registrado inserte otro digito');
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




