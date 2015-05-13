<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class Pais extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Cargamos las librerias, model, helper;
		$this->load->library('form_validation');		
		$this->load->model("Pais_Model");
	}
		// Vista y paginacion
	public function index(){

		$config['uri_segment'] = 4;	
		//* se convierte a minuscula la captura del metodo request = post
	if (strtolower($this->input->server('REQUEST_METHOD'))=='post')
		{
			$page=$this->input->post('page');
			redirect('/Pais/pais/index/');
		}
		else
		{ 
			$page=$this->uri->segment(4,0);			  
		}

		//paginando
		//$config['base_url'] = 'http://localhost/todo_hogar/index.php/Pais/pais/index/'; 
		$config['base_url'] = base_url().'index.php/Pais/pais/index/'; //opcion 2		
		$config['total_rows'] = $this->db->get('pais')->num_rows();
		$config['per_page']   = 4;
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
		$query = $this->db->get('pais');//mi consulta sql
		$data = array 
		(
			'titulo'=> 'Prueba codeigniter',//mi titulo 
			'ENCABEZADO'=> 'Listados Paises: EJEMPLO DE CODEIGNITER',
			"pagi_home"=> "Home",
			"NOTA" => "Home",
			"HOME"=> "http://localhost/todo_hogar/index.php/Home/home",
			'formulario'=> $query->result_array(),    //variable que guarda el resultado de mi consulta sql
			'pagination'=>$this->pagination->create_links(),
			//'filter'=>$filtro										
		);

		
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->load->view('Index/nav_aside.php'); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		
		$this->parser->parse('Pais/pais_vista.php',$data, FALSE); // vista 2
		$this->load->view('Index/pie.php'); // pie con los js
}

	public function add()
	{
		$data = array 
				(
					'titulo'=> 'Prueba codeigniter',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro Pais',
					'Encabezado'=> 'Agregar Pais',//mi titulo 
					"pagi_home"=> "Home",
					"NOTA" => "Home",
			
			"HOME"=> "http://localhost/todo_hogar/index.php/Home/home",

				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->load->view('Index/nav_aside.php'); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('Pais/pais_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	}
	public function adding (){
		// validation de codeigniter 
	
	$this->form_validation->set_rules('Descripcion_Pais', 'Descripcion_Pais', 'required');
	  if ($this->form_validation->run() === FALSE)
	 { 
	 	  // octeneomos los datos del input por medio de post o get
	 	  // SI SON MAS CAMPOS DEBEMOS CARGAR EN UN ARRAY
	 	  //$_data=array('Descripcion1' =>strtoupper($this->input->post("nombre"));
	 	  //     		 'Descripcion2' =>strtoupper($this->input->post("nombre"))
	 	  // O ASI		 "NOMBRE" = $this->input->post("nombre"))); 
	 	 $Descripcion_Pais = $this->input->get_post('Descripcion_Pais',true); // SOLO UN CAMPO
          //ENVÍAMOS LOS DATOS AL Pais_Model A LA FUNTION add_pais COL EL DATO ACTENIDO
	 		$this->Pais_Model->add_pais($Descripcion_Pais);		
		//REEDIRECCIONAR 
		redirect('/Pais/pais/index/');
	
	 }	
	 else // SI NO PASA LA VALIDATION 
	 {
		$data = array 
				(
					'titulo'=> 'Prueba codeigniter',//mi titulo 
					'error'=> '',//mi titulo
					'NOTA'=>'Registro Pais',
					"pagi_home"=> "Home",
					"NOTA" => "Home",
			"HOME"=> "http://localhost/todo_hogar/index.php/Home/home",
					'Encabezado'=> 'Agregar Pais',//mi titulo 
				);	
		$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
		$this->load->view('Index/nav_aside.php'); // esta seria la barra de navegacion horizontal
		$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido
		$this->parser->parse('Pais/pais_add.php', $data);
		$this->load->view('Index/pie.php'); // pie con los js
	 }


	}
	// funcion para editar
	public function edit(){

		$id    = $this->uri->segment(4,0);	// OCTENGO EL ID QUE LE ENVIO A TRAVES DE LA VISTA I LE PASO AL MODELO	 
		$query = $this->Pais_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Prueba codeigniter',//mi titulo 
			'Encabezado'=> 'Detalle de Registros', 
			'NOTA'=>'Editar Registro',
			"pagi_home"=> "Home",
			"NOTA" => "Home",
			"HOME"=> "http://localhost/todo_hogar/index.php/Home/home",
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->load->view('Index/nav_aside.php'); // esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('Pais/pais_edit.php', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}
	

	}
	// guardar lo editado
	function save_edit(){
			
			if (strtolower($this->input->server('REQUEST_METHOD'))=='get')
		{
			// csrgo al array praa enviar al modelo de actualizacion
			$id = $this->input->get('Id_Pais',true);
			$data = array(
				'Descripcion_Pais' => $this->input->get('Descripcion_Pais',true)
			);			
			$this->Pais_Model->save_edit($id,$data);
			redirect('/Pais/pais/index/');
			
		}else{

			$id = $this->input->get('Id_Pais',true);
			$query = $this->Pais_Model->edit($id);// OCTENGO LA CONSULTA QUE ESTA EN EL MODELO EN  FUNCTION EDIT 
		// validamos si nuestra consulta es distinto a false mostramos la vista de editar con los datos
		if ($query != false){
			$data  = array 
			(
			'titulo'=> 'Prueba codeigniter',//mi titulo 
			'Encabezado'=> 'Detalle de Registros', 
			"pagi_home"=> "Home",
			"NOTA" => "Home",
			"HOME"=> "http://localhost/todo_hogar/index.php/Home/home",
			'NOTA'=>'Editar Registro',
			'formulario'=> $query//variable que guarda el resultado de mi consulta sql
			);		
			$this->parser->parse('Index/head.php', $data, FALSE);	// carga todos las url de estilo i js home	
			$this->load->view('Index/nav_aside.php'); // esta seria la barra de navegacion horizontal
			$this->parser->parse('Index/contenedor.php',$data,FALSE); // inicio del contenido	
			$this->parser->parse('Pais/pais_edit.php', $data);
			$this->load->view('Index/pie.php'); // pie con los js
		}else{
			return false;
		}

		}
		
	}

	// dar de baja o elminar
	function delete(){
		$id=$this->uri->segment(4,0);
 		$this->Pais_Model->delete($id);
		redirect('/Pais/pais/index/');	
	}


}

/* End of file pais.php */
/* Location: ./application/controllers/pais.php */




