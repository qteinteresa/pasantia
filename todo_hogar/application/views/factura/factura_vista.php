
  <!-- ---------------------------------------------------------------------------->					  
						 
	  <form  action="<?php echo base_url();?>index.php/factura/factura/filtrado" method='post' name="formulario1">
       <div class="col-md-12 col-md-offset-0">
          <table class=""  >
            <tr id="transparente" >            
              <td>
                <h4> <p class="text-info">{ENCABEZADO}</p></h4> 
              </td>
              <td>
                 &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
                &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;                
              </td>                
               <td>            
                  <div class="input-group">
                    <input class="form-control"  type="text" name="filter" autofocus="autofocus"   size="80%" placeholder="Buscar Cliente" autocomplete="on" onchange="enviar();" required>
                     <input type="hidden" name="page" value="0"> 
                       <span class="input-group-btn">
                        <button class="btn btn-primary hidden-sm" type="submit" onchange="enviar();">
                           <span class="glyphicon glyphicon-search"></span>
                        </button>
                     </span>
                  </div>
               </td>                  
            </tr>            
          </table>        
            </div>         
</form>  

  
  <form  role="form" method='post' name="formulario" action="<?php echo base_url();?>index.php/factura/factura/add">                
             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          
	
	  
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="glyphicon glyphicon-asterisk"></i>Fact. N&deg;</th>
                                 <th><i class="glyphicon glyphicon-qrcode"></i> Cliente</th>
                                 <th><i class="icon_profile"></i>Fecha Expedici&oacute;n</th>
                                 
								  <th><i class="icon_cogs"></i>Action</th>
                              </tr>
                              	{formulario}
                              <tr>
                                <td>
									<div style="font-weight:bold;   font-weight:bold" >{num_factura}</div>
                                </td>
                                <td>
									<div style="font-weight:bold;   font-weight:bold" >{nombre} {apellido}</div>
								</td>
                                <td>
									<div style="font-weight:bold;   font-weight:bold" >{fecha}</div>
								</td>
                               
                                 <td>
                                  <div class="btn-group">
                                   <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
                                      <a class="btn btn-success" href="<?php echo base_url();?>index.php/factura/factura/edit/{num_factura}">Ver Detalles</a>
                                      </div>
                                  </td>
                              </tr>
                              	{/formulario}
                              </tr>                              
                           </tbody>
                        </table>
               <header class="panel-heading">
               <button name="agregar" id="agregar" type="submit" class="btn btn-primary">Crear Venta&nbsp;<i class="icon_plus_alt2"></i></button>

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
<script>
  function enviar()
  {
    document.formulario1.submit();
  }
  </script>