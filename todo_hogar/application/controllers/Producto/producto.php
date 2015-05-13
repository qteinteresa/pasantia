<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class Producto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		//$this->load->library('');		
		$this->load->model("Producto_Model");
		
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
		$config['base_url']        = site_url().'/Producto/producto/ajax_llamado_Paginacion/'; 		
		$config['total_rows']      = $this->db->get('producto')->num_rows();
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
						'formulario' =>  $this->Producto_Model->lista_producto($config["per_page"], $page),
						'ENCABEZADO'=> 'Listados Producto:',
                      );
		 return $data;

	}

	public function index()
	{
		# code...
		$this->output->enable_profiler(true);
		$_data = array 
		(
			'titulo'     => 'Producto',//mi titulo 
			'ENCABEZADO' => 'Listados Producto:',
			"pagi_home"  => "Home",
			"NOTA"       => "Home",
			"pagi1"      => "",
			"pagi2"      => "<li>Listados Producto</li>",
			"pagi3"      => "",
			"usuario"    => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso')									
		);
		 $this->parser->parse('Index/head.php', $_data, FALSE);	// carga todos las url de estilo i js home	
		 $this->parser->parse('Index/nav_aside.php',$_data , false); // esta seria la barra de navegacion horizontal
		 $this->parser->parse('Index/contenedor.php',$_data,FALSE); // inicio del contenido	  
	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('Producto/buscador.php',$data,false);
         $this->parser->parse('Producto/producto_vista',$data,false);
         $this->load->view('Index/pie.php'); 
	}
	  public function ajax_llamado_Paginacion() 
    {	

	    //////////////actenemos los resultado de la paginacion por ajax///////////////
         $data = $this->pagination_code();
         $this->parser->parse('Producto/producto_vista',$data,false);



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
			  redirect('/Producto/producto/index');
			}
			$config['per_page']   = 5;	
			$this->db->limit($config['per_page'],$page);
			$query = $this->Producto_Model->lista_filtro($filter);	

					if ($query != false) {
					$data = array 
					(

						'formulario' =>  $query,//variable que guarda el resultado de mi consulta sql
						'ERROR'=> ''
						// 'pagination'=>$this->pagination->create_links(),
					);
					$this->parser->parse('Producto/filtro.php',$data);
					   
					
					} else
					{
							 	$data = array 
					(

						'formulario'=> $query,
						'ERROR'=> '<h2 class="text-center"><i class="fa fa-exclamation-triangle"></i>No se han encontrado resultados</h2><p class="text-center">Inténta realizar tu búsqueda con palabras más especificas...</p>'
						// 'pagination'=>$this->pagination->create_links(),
						
					);
					$this->parser->parse('Producto/filtro.php',$data);
					   
					}		



 }
    // busqueda autocompletar
public function busqueda_categoria()
	{
		// resivimos los datos del input a traves de la uri, por segment
		$datos = $this->uri->segment(4);
		$this->Producto_Model->get_cate($datos);

	}
	    // busqueda autocompletar
public function busqueda_proveedor()
	{
		// resivimos los datos del input a traves de la uri, por segment
		$datos= $this->uri->segment(4);
		$this->Producto_Model->get_pro($datos);

	}

/////////////////////////////////////////////////////
// vista agregar

	public function add()
	{

		$data = array 
				(
					'titulo'=> 'Producto',//mi titulo 
					'error'=> '',//mi titulo
					'Encabezado'=> 'Agregar Producto',//mi titulo 
					"pagi_home"=> "Home",								
					"pagi1"=> "<li>Agregar Producto</li>",
					"pagi2"=> "",
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	


				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('Producto/producto_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	}
	public function adding (){
		// validation de codeigniter 
		// la validacion esta en el la carpeta config
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('Producto') === False)
			 {  
					 $data = array 
						(
							'titulo'=> 'Producto',//mi titulo 
							'error'=> '',//mi titulo
							'Encabezado'=> 'Agregar Producto',//mi titulo 
							"pagi_home"=> "Home",								
							"pagi1"=> "<li>Agregar Producto</li>",
							"pagi2"=> "",
							"usuario" => $this->session->userdata('usuario'),
							"horaAcceso" => $this->session->userdata('horaAcceso'),	


						);	
				$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
				$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
				$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
				$this->parser->parse('Producto/producto_add.php', $data);
				$this->load->view('Index/pie.php'); // pie con los js
			 }	
			 else // SI NO PASA LA VALIDATION 
			 {
			 	$id_producto = $this->	ultimoProducto();
			 	$code = $id_producto + 10000;

			if (strtolower($this->input->server('REQUEST_METHOD'))=='post'){
			 	 $data = array('codigo' 	        => $code ,
								'cod_barra' 	    => strtoupper($this->input->post('cod_barra',TRUE)), 
								'descripcion' 	    => strtoupper($this->input->post('descripcion',TRUE)), 	
								'id_categoria' 	    => strtoupper($this->input->post('id_categoria',TRUE)), 
								'precio_normal' 	=> strtoupper($this->input->post('precio_normal',TRUE)), 
								'precio_pref' 	    => strtoupper($this->input->post('precio_pref',TRUE)), 
								'precio_vip' 	    => strtoupper($this->input->post('precio_vip',TRUE)), 
								'cantidad' 	        => strtoupper($this->input->post('cantidad',TRUE)), 
								'stock_minimo' 	    => strtoupper($this->input->post('stock_minimo',TRUE)), 
								'descuento' 	    => strtoupper($this->input->post('descuento',TRUE)), 
								'iva' 	            => strtoupper($this->input->post('iva',TRUE)), 
								// 'id_proveedor' 	    => strtoupper($this->input->post('id_proveedor',TRUE)),
			 	 	); 
		         $this->Producto_Model->add_Producto($data);	
		         //////id_producto
		         $id_producto = $this->	ultimoProducto();
		         $_data = array(	'id_producto'   => $id_producto ,
									'id_proveedor'  => strtoupper($this->input->post('id_proveedor',TRUE)),
									'fecha'         => strtoupper($this->input->post('fecha',TRUE)),
		         				
		          );
		         $this->Producto_Model->add_producto_x_pro($_data);
				//REEDIRECCIONAR 
				redirect('/Producto/producto/index/');		
						}
		}


	}
	///funcion ultimo producto para guardar el id_roducto
	
	function ultimoProducto()
	{
		$query = $this->db->query('SELECT MAX(id_producto) as id_producto from producto');
	 	foreach($query->result_array() as $d)
	 	{
			return( $d['id_producto']);
	 	}
	}
	// funcion para editar
	public function edit(){
		

		 $id    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		 $query = $this->Producto_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT
		 $query1 = $this->Producto_Model->edit($id);
		 $query2 = $this->Producto_Model->edit($id); 
		 $query3 = $this->Producto_Model->lista_provee();
		 $query4 = $this->Producto_Model->lista_cate();
	
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Producto',//mi titulo 
			'Encabezado'=> 'Editar de Registros', 
			
			"pagi_home"=> "Home",
					"pagi1"=> "<li>Editar Producto</li>",
					"pagi2"=> "",
			
			"usuario" => $this->session->userdata('usuario'),
			"horaAcceso" => $this->session->userdata('horaAcceso'),	
			'formulario'=> $query,//variable que guarda el resultado de mi consulta sql			
			 'for1'=> $query1,
			 'for2'=> $query2,
			 'for3'=> $query3,
			 'for4'=> $query4
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('Producto/producto_edit.php', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}
	

	}
	// guardar lo editado
	function save_edit(){

		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-exclamation-triangle"></i>','</di>');
		if ($this->form_validation->run('Producto_edit') === False)
			 {  
				 $id    = $this->input->post('id_producto',TRUE);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
				 $query = $this->Producto_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT
				 $query1 = $this->Producto_Model->edit($id);
				 $query2 = $this->Producto_Model->edit($id); 
				 $query3 = $this->Producto_Model->lista_provee();
				 $query4 = $this->Producto_Model->lista_cate();
			
				// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
				if ($query != false){
					$data  = array 
					(
					'titulo'=> 'Producto',//mi titulo 
					'Encabezado'=> 'Editar de Registros', 
					
					"pagi_home"=> "Home",
							"pagi1"=> "<li>Editar Producto</li>",
							"pagi2"=> "",
					
					"usuario" => $this->session->userdata('usuario'),
					"horaAcceso" => $this->session->userdata('horaAcceso'),	
					'formulario'=> $query,//variable que guarda el resultado de mi consulta sql			
					 'for1'=> $query1,
					 'for2'=> $query2,
					 'for3'=> $query3,
					 'for4'=> $query4
					);		
					$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
					$this->parser->parse('Index/nav_aside.php',$data, FALSE);// esta seria la barra de navegacion horizontal
					$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
					$this->parser->parse('Producto/producto_edit.php', $data);
					$this->load->view('Index/pie.php'); // pie con los js
				}else{
					return false;
				}
	



			 }else{
					if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
					{
						// csrgo al array praa enviar al modelo de actualizacion
						$id = $this->input->post('id_producto');

			    		// $this->db->where('id_producto',$id);
					    // $this->db->update('producto',$_data);
				 	 $data = array('codigo' 	        => strtoupper($this->input->post('codigo')),
									'cod_barra' 	    => strtoupper($this->input->post('cod_barra')), 
									'descripcion' 	    => strtoupper($this->input->post('descripcion')), 	
									'id_categoria' 	    => strtoupper($this->input->post('id_categoria')), 
									'precio_normal' 	=> strtoupper($this->input->post('precio_normal')), 
									'precio_pref' 	    => strtoupper($this->input->post('precio_pref')), 
									'precio_vip' 	    => strtoupper($this->input->post('precio_vip')), 
									'cantidad' 	        => strtoupper($this->input->post('cantidad')), 
									'stock_minimo' 	    => strtoupper($this->input->post('stock_minimo')), 
									'descuento' 	    => strtoupper($this->input->post('descuento')), 
									'iva' 	            => strtoupper($this->input->post('iva')));
						  
					 $this->Producto_Model->save_edit($id,$data);
					 $_id = $this->input->post('id_produc_prove');
					 $_data = array('id_producto'  		=> strtoupper($this->input->post('id_producto',TRUE)),
									'id_proveedor' 		=> strtoupper($this->input->post('id_proveedor',TRUE)),
									'fecha'        		=> strtoupper($this->input->post('fecha',TRUE)),
			         				
			          );
			        	$this->Producto_Model->save_edit2($_id,$_data);
						redirect('/Producto/producto/index/');
						
					}else{
							redirect('/Producto/producto/edit/');
					}
	 		}
			

	}

	// dar de baja o elminar
	function delete(){
		$id=$this->uri->segment(4,0);
 		$this->Producto_Model->delete($id);
		redirect('/Producto/producto/index/');	
	}

	// cheque si existe codigo brra 
	public function check_cod_barra($cod_barra){
		# code...
		if ($this->Producto_Model->check_cod_barra($cod_barra)) {
			        
            $this->form_validation->set_message('check_cod_barra', ''.$cod_barra.' ya fue registrado inserte otro digito');
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




