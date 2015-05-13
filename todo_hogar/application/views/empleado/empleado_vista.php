        
<!-- /////////////////////////////////////////////////////////             -->     
         
<div id="refreshData">
             <div class="row" id="target" >
                  <div class="col-lg-12">                     
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr class="active">  
                                 <th><i class="icon_calendar"></i> C&eacute;dula</th>
                                 <th><i class="icon_profile"></i> Nombre</th>
                                 <th><i class="icon_profile"></i> Apellido</th>
                                 <th><i class="icon_pin_alt"></i> Direcci&oacute;n</th>
                                 <th><i class="icon_mobile"></i> Tel&eacute;fono</th>
								                 <th><i class="fa fa-money"></i>   Sueldo</th>
								                 <th><i class="fa fa-share-alt"></i> Cargo</th>
								                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                             </thead>
                             <tbody>
                         
                                {formulario}
                              <tr class="" id="userRecordTabel" >                                 
                                  <td>	{ci}       </td>
                                  <td>	{nombre}   </td>
                                  <td>	{apellido} </td>
                  								<td>	{direccion}</td>
                  								<td>	{telefono} </td>
                  								<td>	{sueldo}   </td>
                  								<td>	{cargo}    </td>
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
                
                  </div>
            
          
<ul class="pager">
  {pagination} 
</ul>
</div>
</div>
