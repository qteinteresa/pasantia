 <section class="panel">
 <?php echo validation_errors();?>
<form   method="get" accept-charset="utf-8" name="formulario" action="<?php echo base_url();?>index.php/factura/factura/save_edit" enctype="multipart/form-data">	
	<header class="panel-heading">
		<h4><p class="text-info">{ENCABEZADO}</span></p></h4></header>
		<div class="row">
	    	<div class="col-lg-12">
	    		<table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="glyphicon glyphicon-asterisk"></i>Cantidad</th>
                                 <th><i class="glyphicon glyphicon-qrcode"></i>Descripcion</th>
								 <th><i class="icon_profile"></i>% Gravado</th>
                                 <th><i class="icon_profile"></i>IVA</th>
								 <th><i class="icon_profile"></i>Importe</th>
                              </tr>
                              	{formulario}
                              <tr>
                                <td>
									<div style="font-weight:bold;   font-weight:bold" >{cantidad}</div>
                                </td>
                                <td>
									<div style="font-weight:bold;   font-weight:bold" >{descripcion}</div>
								</td>
                                <td>
									<div style="font-weight:bold;   font-weight:bold" >{tipo_iva}</div>
								</td>
								<td>
									<div style="font-weight:bold;   font-weight:bold" >{iva}</div>
								</td>
								<td>
									<div style="font-weight:bold;   font-weight:bold" >{precio}</div>
								</td>
                            </tr>
                              	{/formulario}
                              </tr>                              
                           </tbody>
                        </table>
		<table align='center' id="transparente" >	
					
	
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">
    <span class="glyphicon glyphicon-arrow-left"></span> Volver
      </button>
      </table>	
     	</div>			
	</div>
</div>	
	</form>
</section>