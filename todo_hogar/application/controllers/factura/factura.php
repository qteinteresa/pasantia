<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class factura extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		
		
		// Cargamos las librerias, model, helper;
		
	///  no se si deberia cargar empleado y proveedor, puse porque esta el de pais alli. jejje cristiaaaaann
		$this->load->library('form_validation');		
		$this->load->model("factura_Model");
				//control de acceso sin login
		// si no esta logueado redirije a login
		if(!$this->session->userdata('id_usuario'))
		{
		redirect('/Login/login/');
		} 

		
	}
		// Vista y paginacion
	public function index()
	{
		
		$config['uri_segment'] = 4;	
		//* se convierte a minuscula la captura del metodo request = post
		if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
		{
			$page=$this->input->post('page');
			redirect('/factura/factura/index/');
		}
		else
		{ 
			$page=$this->uri->segment(4,0);			  
		}
		//paginando
		//$config['base_url'] = 'http://localhost/c_i/index.php/Pais/pais/index/'; opcion 1 
		$config['base_url'] = base_url().'factura/factura/index/'; //opcion 2		
		$config['total_rows'] = $this->db->get('factura')->num_rows();
		$config['per_page']   = 10;
		$config['num_links']   = 5;
		$config['first_link'] = 'Primero';				
		$config['last_link'] = 'Ultimo';
		$config['next_link'] = 'Siguiente';
		$config['prev_link'] = 'Anterior';
		$this->load->library('pagination');
		//filtrado de busqueda
		//$this->db->limit($config['per_page'],$page);
		//$this->db->like('Descripcion_Pais',$filt);	
		//fin paginando conf

		//iniciamos la paginacion
		$this->pagination->initialize($config);
		//Cargamos los datos para la tabla OJO! acá va el limit
		$this->db->limit($config['per_page'],$page);							
		//Cargamos la vista  
		$query = $this->db->get('factura  INNER JOIN cliente ON factura.ci=cliente.ci');//mi consulta sql
		$data = array 
		(
			'titulo'=> 'Todo Hogar',//mi titulo 
			'ENCABEZADO'=> 'Facturaciones: ',
			"pagi_home"=> "Home",
			"pagi1"=> "<li>Facturacion</li>",
					"pagi2"=> "<li>Listados Facturas</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			'formulario'=> $query->result_array(),    //variable que guarda el resultado de mi consulta sql
			'pagination'=>$this->pagination->create_links(),
			//'filter'=>$filtro										
		);

		
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('factura/factura_vista.php',$data, FALSE); // vista 2
		$this->load->view('Index/pie.php'); // pie con los js
	
	
	
	
	}

	public function add()
	{
	
	$data = array 
				(
					'titulo'=> 'Todo Hogar',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro Factura',
					'ci'=> $this->factura_Model->datos_cliente(),
					'cliente'=> "",
					'precio_normal'=> "<input type='radio' name='precio'>Normal</div>",
					'precio_pref'=> "<input type='radio' name='precio'>Pref.</div>",
					'precio_vip'=>"<BR><input type='radio' name='precio'>Vip</div><br>",
					'direccion'=> "",
					'codigo'=> $this->factura_Model->datos_producto(),
					'Encabezado'=> 'Generar Factura', 
					"pagi_home"=> "Home",
					"pagi1"=> "<li>Facturacion</li>",
					"pagi2"=> "<li>Agregar Factura</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	

				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		
		
		//$this->load->view('factura/factura_add',$data);

		$this->parser->parse('factura/factura_add.php', $data);
		
		
		$this->load->view('Index/pie.php'); // pie con los js
		
	}
	/////////////////////////////////////////////////////////////////////////////////////////////7
	public function adding2 ()
	{
		$this->form_validation->set_rules('id_factura', 'id_factura', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$codigo = $this->input->get_post('codigo',true); // SOLO UN CAMPO
			$cantidad = $this->input->get_post('cantidad',true); // SOLO UN CAMPO
			$tipo_iva = $this->input->get_post('iva',true); // SOLO UN CAMPO
			$precio = $this->input->get_post('precio',true); // SOLO UN CAMPO
			$valor_iva = $this->input->get_post('valor_iva',true); // SOLO UN CAMPO
			//ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
	 			
			$this->factura_Model->add_factura($codigo,$cantidad,$tipo_iva,$precio,$valor_iva);			
			//REEDIRECCIONAR 
			redirect('/factura/factura/index/');
	
		}	
	}
	/////////////////////////////////////////////////////////////////////////////////////////////7
	
	public function adding ()
	{
		// validation de codeigniter
		$this->form_validation->set_rules('num_factura', 'num_factura', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$id_empleado='';
			$nombre_empleado = $this->input->get_post('nombre_empleado',true); // SOLO UN CAMPO
			$ci= $this->input->get_post('ci',true); // SOLO UN CAMPO
			$apellido_empleado = $this->input->get_post('apellido_empleado',true); // SOLO UN CAMPO
			$direccion = $this->input->get_post('direccion',true); // SOLO UN CAMPO
			$telefono = $this->input->get_post('telefono',true); // SOLO UN CAMPO
			$sueldo = $this->input->get_post('sueldo',true); // SOLO UN CAMPO
			$cargo = $this->input->get_post('cargo',true); // SOLO UN CAMPO
		  
			//ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
	 		$this->factura_Model->add_factura($id_empleado,$ci,$nombre_empleado,$apellido_empleado,$direccion,$telefono,$sueldo,$cargo);		
			//REEDIRECCIONAR 
			redirect('/factura/factura/index/');
	
		}	
		else // SI NO PASA LA VALIDATION 
		{
		$data = array 
				(
					'titulo'=> 'Todo Hogar',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro empleado',
					"pagi_home"=> "Home",
					"pagi1"=> "<li>Facturacion</li>",
					"pagi2"=> "<li>Ver Detalles</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
					'Encabezado'=> 'Agregar empleado',//mi titulo 
				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('empleado/empleado_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
		}


	}
	// funcion para editar
	public function edit()
	{

		$id    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->factura_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Todo Hogar',//mi titulo 
			'ENCABEZADO'=> 'Detalle de Factura Nº '.$id, 
			'NOTA'=>'Editar Registro',
			"pagi_home"=> "Home",
			"pagi1"=> "<li>Facturacion</li>",
					"pagi2"=> "<li>Ver Detalles</li>",
					"pagi3"=> "<li>Ver Detalles</li>",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('factura/factura_detalle_vista', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}
	

	}
	// guardar lo editado
	function save_edit(){
			
			if (strtolower($this->input->server('REQUEST_METHOD'))=='get')
		{
			// cargo al array praa enviar al modelo de actualizacion
			$id_empleado = $this->input->get('id_empleado',true);
			$ci = $this->input->get('ci',true);
			$nombre_empleado = $this->input->get('nombre_empleado',true);
			$apellido_empleado = $this->input->get('apellido_empleado',true);
			
			$direccion = $this->input->get('direccion',true);
			$telefono = $this->input->get('telefono',true);
			$sueldo = $this->input->get('sueldo',true);
			$cargo = $this->input->get('cargo',true);
			$data = array(
				'id_empleado' => $this->input->get('id_empleado',true),
				'ci' => $this->input->get('ci',true),
				'nombre' => $this->input->get('nombre_empleado',true),
				'apellido' => $this->input->get('apellido_empleado',true),
				'direccion' => $this->input->get('direccion',true),
				'telefono' => $this->input->get('telefono',true),
				'sueldo' => $this->input->get('sueldo',true),
				'cargo' => $this->input->get('cargo',true),
			);			
			$this->empleado_Model->save_edit($id_empleado,$data);
			redirect('/empleado/empleado/index/');
			
		}else{

			$id = $this->input->get('id_empleado',true);
			$query = $this->empleado_Model->edit($id_empleado);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Todo Hogar',//mi titulo 
			'Encabezado'=> 'Detalle de Registros', 
			"pagi_home"=> "Home",
			"pagi1"=> "<li>Facturacion</li>",
					"pagi2"=> "<li>Listados Clientes</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			'NOTA'=>'Editar Registro',
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('factura/factura_detalle_vista.php', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}

		}
		
	}

	// dar de baja o elminar
	function delete(){
		$id=$this->uri->segment(4,0);
 		$this->empleado_Model->delete($id);
		redirect('/empleado/empleado/index/');	
	}
	////////////////////////////////////////////77
	public function buscar()
	{
		$dato_buscar= $this->input->get('dato_buscar',true);          // OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->factura_Model->buscar($dato_buscar);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Todo Hogar',//mi titulo 
			'ENCABEZADO'=> 'CONSULTAAAAA '.$dato_buscar, 
			'NOTA'=>'CONSULTAAAA  Registro',
			"pagi_home"=> "Home",
			"pagi1"=> "<li>Facturacion</li>",
					"pagi2"=> "<li>Listados Clientes</li>",
					"pagi3"=> "",
				"usuario" => $this->session->userdata('usuario'),
				"horaAcceso" => $this->session->userdata('horaAcceso'),	
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('factura/factura_vista', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}
	

	}
////////////////////////////////////////////////////////////////////////
public function filtrado()
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
			  redirect('/factura/factura/index/');
			}
		//paginando
		
		$config['base_url'] = base_url().'index.php/factura/factura/index/'; //opcion 2		
		$config['total_rows'] = $this->db->get('factura')->num_rows();
		$config['per_page']   = 10;
		$config['num_links']   = 5;
		$config['first_link'] = 'Primero';				
		$config['last_link'] = 'Ultimo';
		$config['next_link'] = 'Siguiente';
		$config['prev_link'] = 'Anterior';
		$this->load->library('pagination');
		//filtrado de busqueda
		$this->db->like('nombre',trim($filter));				
		$this->pagination->initialize($config);
		$this->db->limit($config['per_page'],$page);							
		//Cargamos la vista  
		$query = $this->db->get('factura inner join cliente on factura.ci=cliente.ci ');//mi consulta sql
		$data = array 
		(
			'titulo'=> 'Categoria',//mi titulo 
			'ENCABEZADO'=> 'Listados de Busqueda:',
			"pagi_home"=> "Home",
			"NOTA" => "Home",
					"pagi1"=> "<li>Mantenimiento</li>",
					"pagi2"=> "<li>Listados Busquedas</li>",
					"pagi3"=> "",					
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	 
			'formulario'=> $query->result_array(),    //variable que guarda el resultado de mi consulta sql
			'pagination'=>$this->pagination->create_links(),
			//'filter'=>$filtro										
		);

		
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data , false); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		
		$this->parser->parse('factura/factura_vista.php',$data, FALSE); // vista 2
		$this->load->view('Index/pie.php'); // pie con los js
	}

////////////////////////////////////////////////////////////////////////
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
				  redirect('/factura/factura');
				}
				$config['per_page']   = 8;			
				$this->db->like('ci',trim($filter));
				$this->db->limit($config['per_page'],$page);
				$consulta = "SELECT  CONCAT(nombre,' ',apellido) as nombre,direccion FROM cliente WHERE ci =".$filter." ";
				$query = $this->db->query($consulta);										
				//$query = $this->db->get('empleado');//mi consulta sql
				if ($query->num_rows() > 0) 
				{  $row = $query->row(); 
					$data = array 
					(
					//'cliente'=> $query->result_array(),
					'cliente'=> $row->nombre,
					'direccion'=> $row->direccion,
					'ERROR'=> ''
					);
					$this->parser->parse('factura/filtro.php',$data);
				} 
				else
				{
					$data = array
					(
						'cliente'=> "",
						'direccion'=> "",
						'ERROR'=> 'No encontrado'
					);
					$this->parser->parse('factura/filtro.php',$data);
				 
				}		

	 }
	 
 ///////////////////////////////////////////////////////////////
 /////////////////////////buscador2 filtro///////////////
	public function buscador2()
	{
	
	
			$config['uri_segment'] = 5;
			if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
				{
				   $page=$this->input->post('page');
				   $id=$this->input->post('codigo'); 			
				}
				else
				{ 
				  $page=$this->uri->segment(5,0);			  
				  $id=$this->uri->segment(4,0);			 
				}
			if (0 == strcmp($id, " "))
				{ 
				  redirect('/factura/factura');
				}
				$config['per_page']   = 8;			
				$this->db->like('codigo',trim($id));
				$this->db->limit($config['per_page'],$page);
				$consulta = "SELECT  * FROM producto WHERE id_producto =".$id." ";
				$query = $this->db->query($consulta);										
			
				if ($query->num_rows() > 0) 
				{  $row = $query->row(); 
					$data = array 
					(
					
					//'precio'=> $row->precio_normal,
					'precio_normal'=> $row->precio_normal,
					'precio_pref'=> $row->precio_pref,
					'precio_vip'=> $row->precio_vip,
					
					'ERROR'=> ''
					);
					$this->parser->parse('factura/filtro2.php',$data);
				} 
				else
				{
					$data = array
					(
						'precio_normal'=> "",
						'precio_pref'=> "",
						'precio_vip'=> "",
						'ERROR'=> 'No encontrado'
					);
					$this->parser->parse('factura/filtro2.php',$data);
				 
				}		

	 }
	 public function buscador3()
	{
			$codigo=$this->input->post('codigo'); 
			
			$data = array
					(
						'precio_normal'=>  $codigo,
					
						'ERROR'=> 'No encontrado'
					);
			$this->parser->parse('factura/filtro2.php',$data);
	}
 ///////////////////////////////////////////////////////////////
 
 

}

/* End of file pais.php */
/* Location: ./application/controllers/pais.php */




