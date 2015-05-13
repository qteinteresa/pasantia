  <form  role="form" method='post' name="formulario" action="<?= base_url();?>index.php/Pais/pais/add">                
             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h4><p class="text-info">{ENCABEZADO}</span></p></h4>
                          </header>

                     
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID</th>
                                 <th><i class="icon_calendar"></i> Fecha</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="icon_pin_alt"></i> Nombre de Pais</th>
                                 <th><i class="icon_mobile"></i> Telefono</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              	{formulario}
                              <tr>
                                 <td>
                                 <div style="font-weight:bold;   font-weight:bold" >{Id_Pais}</div>
                                 </td>
                                 <td>2015-00-00</td>
                                 <td>dale@chief.info</td>
                                 <td>
                                 <div style="font-weight:bold;  font-weight:bold" >{Descripcion_Pais}</div>
                                 </td>
                                 <td>000.000.000</td>
                                 <td>
                                  <div class="btn-group">
                                   <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
                                      <a class="btn btn-success" href="<?= base_url();?>index.php/Pais/pais/edit/{Id_Pais}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?= base_url();?>index.php/Pais/pais/delete/{Id_Pais}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                              	{/formulario}
                              </tr>                              
                           </tbody>
                        </table>
               <header class="panel-heading">
               <button type="submit" class="btn btn-primary">Agregar&nbsp;<i class="icon_plus_alt2"></i></button>

               </header>
                      </section>
                  </div>
              </div>

    </form>
              <!-- page end-->


<ul class="pager">
 
   <li class="active">
  	{pagination} 
  	</li>
  
</ul>
