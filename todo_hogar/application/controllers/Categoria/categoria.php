<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class Categoria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		$this->load->library('form_validation');		
		$this->load->model("Categoria_Model");
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
		$config['base_url']        = site_url().'/Categoria/categoria/ajax_llamado_Paginacion/'; 		
		$config['total_rows']      = $this->db->get('categoria')->num_rows();
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
						'formulario' =>  $this->Categoria_Model->getCategoria($config["per_page"], $page),
						'ENCABEZADO'=> 'Listados Categorias:',
                      );
		 return $data;

	}

	public function index()
	{
		# code...
		$_data = array 
		(
			'titulo'     => 'Categoria',//mi titulo 
			'ENCABEZADO' => 'Listados Categorias:',
			"pagi_home"  => "Home",
			"NOTA"       => "Home",
			"pagi1"      => "<li>Mantenimiento</li>",
			"pagi2"      => "<li>Listados Categorias</li>",
			"pagi3"      => "",
			"usuario"    => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso')									
		);
		 $this->parser->parse('Index/head.php', $_data, FALSE);	// carga todos las url de estilo i js home	
		 $this->parser->parse('Index/nav_aside.php',$_data , false); // esta seria la barra de navegacion horizontal
		 $this->parser->parse('Index/contenedor.php',$_data,FALSE); // inicio del contenido	  
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('Categoria/buscador.php',$data,false);
         $this->parser->parse('Categoria/categoria_vista',$data,false);
         $this->load->view('Index/pie.php'); 
	}
	  public function ajax_llamado_Paginacion() 
    {	  
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('Categoria/categoria_vista',$data,false);
       


    }
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
			  redirect('/Categoria/categoria/index');
			}
			//////////////////////////////////////////////////////////////////
			///////////////////////////paginando//////////////////////////////
			$config                    = array();
			$config['base_url']        = site_url().'/Categoria/categoria/ajax_llamado_Paginacion/'; 		
			$config['total_rows']      = $this->db->get('categoria')->num_rows();
			$config['per_page']        = 5;
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
			$this->db->like('categoria',trim($filter));
			$this->db->limit($config['per_page'],$page);							
			$query = $this->db->get('categoria');//mi consulta sql
			if ($query->num_rows() > 0) {
			$data = array 
			(

				'formulario'=> $query->result_array(),//guarda el resultado de mi consulta sql
				'ERROR'=> ''
	
			);
			$this->parser->parse('Categoria/filtro.php',$data);
			   
			
			} else{
			$data = array 
			(

				'formulario'=> $query->result_array(),
				'ERROR'=> '<h2 class="text-center"><i class="fa fa-exclamation-triangle"></i>No se han encontrado resultados</h2><p class="text-center">Inténta realizar tu búsqueda con palabras más especificas...</p>'
				
				
			);
			$this->parser->parse('Categoria/filtro.php',$data);

			}		



 }


	public function add()
	{

		$data = array 
				(
					'titulo'=> 'Categoria',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro Categoria',
					'Encabezado'=> 'Agregar Categoria',//mi titulo 
					"pagi_home"=> "Home",
					"NOTA" => "Home",			
					
					"pagi1"=> "<li>Mantenimiento</li>",
					"pagi2"=> "<li>Agregar Categorias</li>",
					"pagi3"=> "",
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	 
				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data , false); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('Categoria/categoria_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	}
	public function adding (){
		// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('Categoria') === False)
			 {  
					$data = array 
				(
					'titulo'=> 'Categoria',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Error Registro Categoria',
					'Encabezado'=> 'Agregar Categoria',//mi titulo 
					"pagi_home"=> "Home",
					"NOTA" => "Home",			
					
					"pagi1"=> "<li>Mantenimiento</li>",
					"pagi2"=> "<li>Agregar Categorias</li>",
					"pagi3"=> "",
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	 
				);	
					$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
					$this->parser->parse('Index/nav_aside.php',$data , false); // esta seria la barra de navegacion horizontal
					$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
					$this->parser->parse('Categoria/categoria_add.php', $data);
					$this->load->view('Index/pie.php'); // pie con los js
		}else{
					 $categoria = strtoupper($this->input->post('categoria',true)); 
			         $this->Categoria_Model->add_categoria($categoria);		
					//REEDIRECCIONAR 
					redirect('/Categoria/categoria/index/');

		}
	 	 



	}
	// funcion para editar
	public function edit(){

		$id    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->Categoria_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Categoria',//mi titulo 
			'Encabezado'=> 'Editar de Registros', 
			'NOTA'=>'Editar Registro',
			"pagi_home"=> "Home",
			"NOTA" => "Home",
				   "pagi1"=> "<li>Mantenimiento</li>",
					"pagi2"=> "<li>Actualizar Categorias</li>",
					"pagi3"=> "",					
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	 
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
				$this->parser->parse('Index/nav_aside.php',$data , false); // esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('Categoria/categoria_edit.php', $data);
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
		if ($this->form_validation->run('Categoria2') === FALSE) {
					$id    = $this->input->post('id_categoria',true);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
					$query = $this->Categoria_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
					// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
					if ($query != false){
						$data  = array 
						(
						'titulo'=> 'Categoria',//mi titulo 
						'Encabezado'=> 'Editar de Registros', 
						'NOTA'=>'Editar Registro',
						"pagi_home"=> "Home",
						"NOTA" => "Home",
							   "pagi1"=> "<li>Mantenimiento</li>",
								"pagi2"=> "<li>Actualizar Categorias</li>",
								"pagi3"=> "",					
								"usuario" => $this->session->userdata('usuario'),
								"horaAcceso" => $this->session->userdata('horaAcceso'),	 
						'formulario'=> $query//variable que guarda el resultado de mi consulta sql
						);		
						$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
							$this->parser->parse('Index/nav_aside.php',$data , false); // esta seria la barra de navegacion horizontal
						$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
						$this->parser->parse('Categoria/categoria_edit.php', $data);
						$this->load->view('Index/pie.php'); // pie con los js
					}else{
						return false;
					}
			
			}else{							
					if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
					{
						// csrgo al array praa enviar al modelo de actualizacion
						$id = $this->input->post('id_categoria',true);
						$data = array(
							'categoria' => strtoupper($this->input->post('categoria',true))
						);			
						$this->Categoria_Model->save_edit($id,$data);
						redirect('/Categoria/categoria/index/');
						
					}else{

						redirect("/Categoria/categoria/edit/");

					}
			}		
	}

	// dar de baja o elminar
	function delete(){
		$id=$this->uri->segment(4,0);
 		$this->Categoria_Model->delete($id);
		redirect('/Categoria/categoria/index/');	
	}
	public function check_categoria($categoria)
	{
		if ($this->Categoria_Model->check_categoria($categoria)) {
			        
            $this->form_validation->set_message('check_categoria', ''.$categoria.' ya fue registrado');
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




