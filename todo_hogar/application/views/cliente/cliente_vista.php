      
<!-- /////////////////////////////////////////////////////////             -->
<div id="refreshData">
             <div class="row" id="target" >
                  <div class="col-lg-12">                     
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr class="active">                               
                                <th><i class="glyphicon glyphicon-qrcode"></i>CI.</th>
                                <th><i class="glyphicon glyphicon-user"></i> Nombre</th>
								                <th><i class="glyphicon glyphicon-user"></i> Apellido</th>
								                <th><i class="icon_mobile"></i> Fecha de nacimiento</th>
                                <th><i class="icon_pin_alt"></i>Direcci&oacute;n</th>
                                <th><i class="icon_mobile"></i>Tel&eacute;fono</th>
								                <th><i class="icon_mobile"></i>Celular</th>
								                <th><i class="icon_pin_alt"></i>Lugar_trabajo</th>
								                <th><i class="glyphicon glyphicon-usd"></i>L&iacute;mite Cr&eacute;dito</th>
								                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              	{formulario}
                              <tr id="userRecordTabel">                          
                                <td>
                									{ci}
                								</td>
                                <td>
                									{nombre}
                								</td>
                                <td>
                									{apellido}
                                </td>
                								<td>
                									{fecha_nac}
                								</td>
                								<td>
                									{direccion}
                								</td>
                								<td>
                									{telefono}
                								</td>
                								<td>
                									{celular}
                								</td>
                								<td>
                									{lugar_trabajo}
                								</td>
                								<td>
                									{limite_credito}
                								</td>								
                                 <td>
                                  <div class="btn-group">
                                      <!-- <a class="btn btn-primary" href="<?php echo base_url();?>index.php/cliente/cliente/add"><i class="icon_plus_alt2"></i></a> -->
                                      <a class="btn btn-success" href="<?php echo base_url();?>index.php/cliente/cliente/edit/{id_cliente}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?php echo base_url();?>index.php/cliente/cliente/delete/{id_cliente}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              	{/formulario}
                                                          
                           </tbody>
                        </table>
                    
                  </div>
            
<ul class="pager">
  {pagination} 
</ul>
</div>  </div>
