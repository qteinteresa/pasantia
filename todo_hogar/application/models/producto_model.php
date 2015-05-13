<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	// checkdate(month, day, year)
	function check_cod_barra($cod_barra)
	{
		$this->db->select('cod_barra');
		$this->db->where('cod_barra',$cod_barra);
		$consulta = $this->db->get('producto');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}
	 function add_producto($data)
	{

		$this->db->insert('producto',$data);

	}
	function add_producto_x_pro($_data)
	{
		# code...
		$this->db->insert('producto_x_proveedor', $_data);
	}
	 function edit ($id)
	{
			$consult="SELECT producto.id_producto ,producto.codigo ,producto.cod_barra , 
    				producto.descripcion,producto.precio_normal , producto.precio_pref ,
    				producto.precio_vip ,producto.cantidad, producto.stock_minimo ,producto.descuento,
    				producto.iva , producto_x_proveedor.fecha ,producto_x_proveedor.id_produc_prove, proveedor.id_proveedor, proveedor.razon_social , categoria.id_categoria, categoria.categoria 
    			from producto_x_proveedor, producto, categoria, proveedor 
    			where producto.id_producto=producto_x_proveedor.id_producto 
    			and categoria.id_categoria=producto.id_categoria 
    			and proveedor.id_proveedor = producto_x_proveedor.id_proveedor 
			 	and producto.id_producto =".$id;
			$query = $this->db->query($consult);//mi consulta sql
			//VALIDAR SI TENEMOS REGISTRO 
			if ($query->num_rows() > 0) {
				return $query->result();
			} else
			{
				return false;
			}
	}
	// actualizar producto
     function save_edit($id,$data)
    {
    	# code...
  		$this->db->where('id_producto',$id);
		$this->db->update('producto',$data);
	}
	// actualizar producto PROVEEDOR
	function save_edit2($_id,$_data)
	{
		# code...
		$this->db->where('id_produc_prove',$_id);
		$this->db->update('producto_x_proveedor',$_data);
	}
	// eliminar u registo producto 
     function delete($id)
    {
    	# code...
    	$this->db->where('id_producto',$id);
		$this->db->delete('producto');//mi consulta sql
		$query = $this->db->get('producto');//mi consulta sql
		$this->db->where('producto_x_proveedor.id_producto',$id);
		$this->db->delete('producto_x_proveedor');//mi consulta sql
		$query = $this->db->get('producto_x_proveedor');//mi consulta sql
    }



    //////////////////////////////////////////////////////////
    ///////////////////consultas /////////////////////////////
     function lista_producto($limit, $start)
     {        
		$this->db->limit($limit, $start);
		$this->db->select("producto.id_producto as id_producto ,producto.codigo as codigo,producto.cod_barra , producto.descripcion,producto.precio_normal , producto.precio_pref ,producto.precio_vip ,producto.cantidad, producto.stock_minimo ,producto.descuento,producto.iva , producto_x_proveedor.fecha , proveedor.razon_social ,categoria.categoria");
		$this->db->from('producto_x_proveedor, producto, categoria, proveedor'); 
	    $this->db->where('producto_x_proveedor.id_producto = producto.id_producto 
	    	and categoria.id_categoria=producto.id_categoria 
	    	and producto_x_proveedor.id_proveedor = proveedor.id_proveedor');

	    $query = $this->db->get();
	    return $query->result_array();

	
    }
    function lista_filtro($filter)
    {
    	$consulta = "SELECT producto.id_producto ,producto.codigo ,producto.cod_barra , 
    				producto.descripcion,producto.precio_normal , producto.precio_pref ,
    				producto.precio_vip ,producto.cantidad, producto.stock_minimo ,producto.descuento,
    				producto.iva , producto_x_proveedor.fecha , proveedor.razon_social ,categoria.categoria 
    			from producto_x_proveedor, producto, categoria, proveedor 
    			where producto.id_producto=producto_x_proveedor.id_producto 
    			and categoria.id_categoria=producto.id_categoria 
    			and proveedor.id_proveedor = producto_x_proveedor.id_proveedor 
				and categoria.categoria LIKE '%".$filter."%' ";
			$query = $this->db->query($consulta);
			return $query->result();
    }


    function  lista_cate()
    {
    // 	# code...
		 $consult='select categoria.id_categoria as id_categoria , categoria.categoria as categoria from   categoria';
	    $query2 = $this->db->query($consult);
	    return $query2->result();
	
    }
    function lista_provee()
    {
    // 	# code...
		 $consult='select  proveedor.id_proveedor as id_proveedor, proveedor.razon_social as razon_social from    proveedor ';
	    $query2 = $this->db->query($consult);
	    return $query2->result();
	
    }

    /////////////////////////////////////////////////////////////////
    function get_cate($datos)
    {
    	# code...
    			// mi consulta 
		// yo no envio al modelo buee para prueba nomas por ahora
	// yo no envio al modelo buee para prueba nomas por ahora
		$data = $this->db->query("select id_categoria,categoria from categoria where categoria like '%$datos%' ");
		// $data = $this->db->query("select id_proveedor,razon_social from proveedor where proveedor like '%$datos%' ");
		
		// formateo los datos en una matriz
		foreach($data->result() as $row)
		{
			$arr['query'] = $datos;
			$arr['suggestions'][] = array(
				'value'	=>$row->categoria,
				'data'	=>$row->id_categoria
			);
		}
		// minimo  PHP 5.2
		echo json_encode($arr);
    }

    function get_pro($datos)
    {
    	# code...
    			// mi consulta 
		// yo no envio al modelo buee para prueba nomas por ahora
		$data = $this->db->query("select id_proveedor,razon_social from proveedor where razon_social like '%$datos%' ");
		// $data = $this->db->query("select id_proveedor,razon_social from proveedor where proveedor like '%$datos%' ");
		
		// formateo los datos en una matriz
		foreach($data->result() as $row)
		{
			$arr['query'] = $datos;
			$arr['suggestions'][] = array(
				'value'	=>$row->razon_social,
				'data'	=>$row->id_proveedor
			);
		}
		// minimo  PHP 5.2
		echo json_encode($arr);
    }

	

}

/* End of file producto_model.php */
/* Location: ./application/models/producto_model.php */