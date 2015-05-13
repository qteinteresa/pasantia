 <section class="panel">
 <?php echo validation_errors();?>
<form   method="post" accept-charset="utf-8" name="formulario" action="<?php echo base_url();?>index.php/proveedor/proveedor/save_edit" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
			{formulario}		        
			<tr id="transparente">
			   
				<td><input type='hidden' size='35'  class="form-control" id='id_proveedor'  name='id_proveedor' value="{id_proveedor}" readonly=""></td>				
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">R.U.C.</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Ruc"     size='35' id='ruc' name='ruc'  title="ingrese el ruc" pattern="[0-9]{3,15}" min="3" maxlength="15"  value="{ruc}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold"> Raz&oacute;n Social</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Razon Social"     size='35' id='razon_social' name='razon_social'  title="ingrese la razon social" pattern="[A-Za-z\S]{2,20}" maxlength="20"  value="{razon_social}" required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Direcci&oacute;n</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Direccion"     size='35' id='direccion' name='direccion'  title="Ingrese direccion" pattern="[A-Za-z\S]{2,30}" maxlength="30"  value="{direccion}" required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Tel&eacute;fono</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Telefono"     size='35' id='telefono' name='telefono'  title="ingrese telefono" pattern="[0-9]{10,15}" maxlength="15"  value="{telefono}" required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Correo</td>
				<td>
								<input type='email'  class="form-control"  autofocus="autofocus" placeholder="ejemplo@correo.com"     size='35' id='mail' name='mail'  title="ingrese mail" pattern="[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}" maxlength="30"  value="{mail}" required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">P&aacute;gina Web</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="www.mipaia.comm"     size='35' id='pag_web' name='pag_web'  title="ingrese el pagina" pattern="[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)( [a-zA-Z0-9\-\.\?\,\'\/\\\+&%\$#_]*)?$" maxlength="30"  value="{pag_web}" >
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Cuenta Bancaria</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Cuenta Bancaria"     size='35' id='cuenta_bancaria' name='cuenta_bancaria'  title="ingrese cuenta bancaria" pattern="[0-9]{0,15}" maxlength="15"  value="{cuenta_bancaria}">
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Vendedor</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Vendedor"     size='35' id='vendedor' name='vendedor'  title="ingrese el nombre del vendedor" pattern="[A-Za-z\S]{2,35}"  maxlength="35"  value="{vendedor}" >
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">L&iacute;mite Cr&eacute;dito</td>
				<td>
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Limite  de Credito"     size='35' id='limite_credito' name='limite_credito'  title="ingrese el nCredito limite" pattern="[0-9]{2,10}"  maxlength="10"  value="{limite_credito}" required>
				</td>
			</tr>
			
			
			{/formulario}
					    </tbody>
		</table>
		<table align='center' id="transparente" >	
		<button type="submit" class="btn btn-info">
    			<i class="fa fa-refresh "></i> Actualizar
     	</button>&nbsp;&nbsp;&nbsp;				
	
<button type="button" class="btn btn-danger" onClick="javascript:history.go(-1)">
    <span class="glyphicon glyphicon-floppy-remove"></span> Cancelar
      </button>	
      </table>	
     	</div>			
	</div>
</div>	
	</form>
</section>