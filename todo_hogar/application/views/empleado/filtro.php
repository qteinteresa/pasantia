
             <div class="row"  >
                  <div class="col-lg-12">                     
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                              <tr class="active">  
                                 <th><i class="icon_calendar"></i> C&eacute;dula</th>
                                 <th><i class="icon_profile"></i> Nombre</th>
                                 <th><i class="icon_profile"></i> Apellido</th>
                                 <th><i class="icon_pin_alt"></i> Direcci&oacute;n</th>
                                 <th><i class="icon_mobile"></i> Tel&eacute;fono</th>
                                 <th><i class="icon_cogs"></i> Sueldo</th>
                                 <th><i class="icon_cogs"></i> Cargo</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                             </thead>
                             <tbody>
                         
                                {formulario}
                              <tr class="" id="userRecordTabel" >                                 
                                  <td>
                                    <div style="font-weight:bold;   font-weight:bold" >{ci}</div>
                                  </td>
                                  <td>
                                    <div style="font-weight:bold;   font-weight:bold" >{nombre}</div>
                                  </td>
                                  <td>
                                    <div style="font-weight:bold;  font-weight:bold" >{apellido}</div>
                                   </td>
                                  <td>
                                    <div style="font-weight:bold;  font-weight:bold" >{direccion}</div>
                                  </td>
                                  <td>
                                    <div style="font-weight:bold;  font-weight:bold" >{telefono}</div>
                                  </td>
                                  <td>
                                    <div style="font-weight:bold;  font-weight:bold" >{sueldo}</div>
                                  </td>
                                  <td>
                                    <div style="font-weight:bold;  font-weight:bold" >{cargo}</div>
                                  </td>
                                  <td>
                                    <div class="btn-group">
                                     <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
                                        <a class="btn btn-success" href="<?php echo base_url();?>index.php/empleado/empleado/edit/{id_empleado}"><i class="icon_check_alt2"></i></a>
                                        <a class="btn btn-danger" href="<?php echo base_url();?>index.php/empleado/empleado/delete/{id_empleado}"><i class="icon_close_alt2"></i></a>
                                    </div>
                                  </td>
                              </tr>
                                {/formulario}
                                                         
                           </tbody>
                        </table>
                     
                          <div id="" class="center-block ">
                            {ERROR}
                          </div>
                    

                  </div>
              </div>