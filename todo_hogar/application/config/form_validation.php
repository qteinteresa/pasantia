<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
       $config = array(
//////////////////////////////////////// // validacion para producto y producto_x_proveedor//////////////////////////////////////////
       		  		'Producto' => array(
                           								
                                  array(
                                            'field' => 'cod_barra',
                                            'label' => 'Codigo de barra',
                                            'rules' => 'trim|required|callback_check_cod_barra|numeric|min_length[2]|max_length[20]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'precio_normal',
                                            'label' => 'Precio Normal',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'precio_pref',
                                            'label' => 'precio Pref:',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'precio_vip',
                                            'label' => 'Precio Vip',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cantidad',
                                            'label' => 'Cantidad',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'descripcion',
                                            'label' => 'Descripcion',
                                            'rules' => 'trim|required|alpha|min_length[5]|max_length[100]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'stock_minimo',
                                            'label' => 'Stock Minimo',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                          array(
                                            'field' => 'descuento',
                                            'label' => 'Descuento',
                                            'rules' => 'trim|numeric|min_length[1]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'iva',
                                            'label' => 'Iva',
                                            'rules' => 'trim|required|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                     array(
                                            'field' => 'fecha',
                                            'label' => 'Fecha',
                                            'rules' => 'trim|required|min_length[10]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                      array(
                                            'field' => 'id_categoria',
                                            'label' => 'Categoria',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'id_proveedor',
                                            'label' => 'Proveedor',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                    ),

                                       // final
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       		  		'Producto_edit' => array(

       								// validacion para producto y producto_x_proveedor saveedit
                                  array(
                                            'field' => 'cod_barra',
                                            'label' => 'Codigo de barra',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[20]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'precio_normal',
                                            'label' => 'Precio Normal',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'precio_pref',
                                            'label' => 'precio Pref:',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'precio_vip',
                                            'label' => 'Precio Vip',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cantidad',
                                            'label' => 'Cantidad',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'descripcion',
                                            'label' => 'Descripcion',
                                            'rules' => 'trim|required|alpha|min_length[5]|max_length[100]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'stock_minimo',
                                            'label' => 'Stock Minimo',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                          array(
                                            'field' => 'descuento',
                                            'label' => 'Descuento',
                                            'rules' => 'trim|numeric|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'iva',
                                            'label' => 'Iva',
                                            'rules' => 'trim|required|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                     array(
                                            'field' => 'fecha',
                                            'label' => 'Fecha',
                                            'rules' => 'trim|required|min_length[10]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                      array(
                                            'field' => 'id_categoria',
                                            'label' => 'Categoria',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'id_proveedor',
                                            'label' => 'Proveedor',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                    ),

                                       // final
//////////////////////////////////////////validation login////////////////////////////////////////////////////////////////////////////

  					'login' => array(
                                   array(
                                            'field' => 'usuario',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|callback_check_nombre|strip_tags|xss_clean'
                                         ),
                                     array(
                                            'field' => 'pass',
                                            'label' => 'Contraseña',
                                            'rules' => 'trim|required|callback_check_pass|strip_tags|xss_clean'
                                         ),
                    ),
                                       // final
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////validation Caegoria////////////////////////////////////////////////////////////////////////////

                    'Categoria' => array(
                                       // validacion para categoria
                                           array(
                                            'field' => 'categoria',
                                            'label' => 'Categoria',
                                            'rules' => 'trim|required|callback_check_categoria|min_length[5]|max_length[50]|strip_tags|xss_clean'
                                         )
                    ),
                                       // final
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                    
  					'Categoria2' => array(
                                       // validacion para categoria
                                           array(
                                            'field' => 'categoria',
                                            'label' => 'Categoria',
                                            'rules' => 'required|alpha|min_length[5]|max_length[50]|strip_tags|xss_clean'
                                         )
                    ),
                                       // final
//////////////////////////////////////////Validation Ciente/////////////////////////////////////////////////////////////////////////////////////
                'cliente' => array(

                                  array(
                                            'field' => 'ci',
                                            'label' => 'Cedula',
                                            'rules' => 'trim|required|callback_check_ci_cliente|numeric|min_length[2]|max_length[11]|strip_tags|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'apellido',
                                            'label' => 'Apellido:',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'fecha_nac',
                                            'label' => 'Fecha',
                                            'rules' => 'trim|required|min_length[2]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion',
                                            'rules' => 'trim|required|min_length[1]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|numeric|min_length[5]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'celular',
                                            'label' => 'Celular',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                          array(
                                            'field' => 'lugar_trabajo',
                                            'label' => 'Lugar de trabajo',
                                            'rules' => 'trim|required|min_length[1]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'limite_credito',
                                            'label' => 'Limi Credito',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),

                    ),

                                       // final
            
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'cliente2' => array(

                       
                                  array(
                                            'field' => 'ci',
                                            'label' => 'Cedula',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[11]|strip_tags|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'apellido',
                                            'label' => 'Apellido:',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'fecha_nac',
                                            'label' => 'Fecha',
                                            'rules' => 'trim|required|min_length[2]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion',
                                            'rules' => 'trim|required|min_length[1]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|numeric|min_length[5]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'celular',
                                            'label' => 'Celular',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                          array(
                                            'field' => 'lugar_trabajo',
                                            'label' => 'Lugar de trabajo',
                                            'rules' => 'trim|required|min_length[1]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'limite_credito',
                                            'label' => 'Limi Credito',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),


                    ),

                                       // final                   
///////////////////////////////////////////////////////Validcion Proveedor///////////////////////////////////////////////////////////////////

                'proveedor' => array(

                                    array(
                                            'field' => 'ruc',
                                            'label' => 'Ruc',
                                            'rules' => 'trim|required|numeric|callback_check_ruc|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'razon_social',
                                            'label' => 'Razon Social',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion:',
                                            'rules' => 'trim|required|min_length[2]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'mail',
                                            'label' => 'Emil Correo',
                                            'rules' => 'trim|required|valid_email|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'pag_web',
                                            'label' => 'Pagina web',
                                            'rules' => 'trim|in_length[5]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cuenta_bancaria',
                                            'label' => 'Cuenta Bancaria',
                                            'rules' => 'trim|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'vendedor',
                                            'label' => 'Vendedor',
                                            'rules' => 'trim|required|min_length[1]|max_length[35]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'limite_credito',
                                            'label' => 'Limi Credito',
                                            'rules' => 'trim|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),

                    ),

                                       // final
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'proveedor2' => array(

                                    // validacion para producto y producto_x_proveedor
                                  array(
                                            'field' => 'ruc',
                                            'label' => 'Ruc',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'razon_social',
                                            'label' => 'Razon Social',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion:',
                                            'rules' => 'trim|required|min_length[2]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'mail',
                                            'label' => 'Emil Correo',
                                            'rules' => 'trim|required|valid_email|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'pag_web',
                                            'label' => 'Pagina web',
                                            'rules' => 'trim|min_length[5]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                       array(
                                            'field' => 'cuenta_bancaria',
                                            'label' => 'Cuenta Bancaria',
                                            'rules' => 'trim|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                          array(
                                            'field' => 'vendedor',
                                            'label' => 'Vendedor',
                                            'rules' => 'trim|required|min_length[1]|max_length[35]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'limite_credito',
                                            'label' => 'Limi Credito',
                                            'rules' => 'trim|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),

                    ),
/////////////////////////////////////////////Validacion empleado///////////////////////////////////////////////////////////////////////
                'empleado' => array(
                                  array(
                                            'field' => 'cedula',
                                            'label' => 'Cedula',
                                            'rules' => 'trim|required|callback_check_ci|numeric|min_length[2]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre_empleado',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'apellido_empleado',
                                            'label' => 'Apellido:',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion:',
                                            'rules' => 'trim|required|min_length[2]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'sueldo',
                                            'label' => 'Sueldo',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cargo',
                                            'label' => 'Cargo',
                                            'rules' => 'trim|required|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),

                    ),

                                       // final
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'empleado2' => array(

                                    array(
                                            'field' => 'cedula',
                                            'label' => 'Cedula',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre_empleado',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'apellido_empleado',
                                            'label' => 'Apellido:',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion:',
                                            'rules' => 'trim|required|min_length[2]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'sueldo',
                                            'label' => 'Sueldo',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cargo',
                                            'label' => 'Cargo',
                                            'rules' => 'trim|required|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),

                    ),
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Validacion empleado con Usuario///////////////////////////////////////////////////////////////////////
                'emple_user' => array(
                                    array(
                                            'field' => 'cedula',
                                            'label' => 'Cedula',
                                            'rules' => 'trim|required|callback_check_ci|numeric|min_length[2]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre_empleado',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'apellido_empleado',
                                            'label' => 'Apellido:',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion:',
                                            'rules' => 'trim|required|min_length[2]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'sueldo',
                                            'label' => 'Sueldo',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cargo',
                                            'label' => 'Cargo',
                                            'rules' => 'trim|required|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    //////////////////////////////////////
                                     array(
                                            'field' => 'usuario',
                                            'label' => 'Usuario',
                                            'rules' => 'trim|required|callback_check_usuario|min_length[5]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                      array(
                                            'field' => 'pass',
                                            'label' => 'Contraseña',
                                            'rules' => 'trim|required|min_length[5]|max_length[10]|strip_tags|xss_clean'
                                         ),

                    ),

                                       // final
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                'emple_user2' => array(

                                        array(
                                            'field' => 'cedula',
                                            'label' => 'Cedula',
                                            'rules' => 'trim|required|numeric|min_length[2]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'nombre_empleado',
                                            'label' => 'Nombre',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'apellido_empleado',
                                            'label' => 'Apellido:',
                                            'rules' => 'trim|required|min_length[2]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'direccion',
                                            'label' => 'Direccion:',
                                            'rules' => 'trim|required|min_length[2]|max_length[50]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'telefono',
                                            'label' => 'Telefono',
                                            'rules' => 'trim|required|min_length[2]|max_length[15]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'sueldo',
                                            'label' => 'Sueldo',
                                            'rules' => 'trim|required|numeric|min_length[1]|max_length[11]|strip_tags|xss_clean'
                                         ),
                                    array(
                                            'field' => 'cargo',
                                            'label' => 'Cargo',
                                            'rules' => 'trim|required|min_length[1]|max_length[30]|strip_tags|xss_clean'
                                         ),
                                    //////////////////////////////////////
                                     array(
                                            'field' => 'usuario',
                                            'label' => 'Usuario',
                                            'rules' => 'trim|required|min_length[5]|max_length[10]|strip_tags|xss_clean'
                                         ),
                                      array(
                                            'field' => 'pass',
                                            'label' => 'Contraseña',
                                            'rules' => 'trim|required|min_length[5]|max_length[10]|strip_tags|xss_clean'
                                         ),

                    ),
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
               );

				

