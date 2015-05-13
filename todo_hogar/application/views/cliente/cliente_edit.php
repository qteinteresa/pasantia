 <section class="panel">
 <?php echo validation_errors();?>
<form   method="post" accept-charset="utf-8" name="formulario" action="<?php echo base_url();?>index.php/cliente/cliente/save_edit" enctype="multipart/form-data">	


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
			   
				<td><input type='hidden' size='35'  class="form-control" id='id_cliente'  name='id_cliente' value="{id_cliente}" readonly=""></td>				
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">CI.</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='ci' name='ci'  title="ingrese numero de cedula" pattern="[0-9]{5,30}" min="5" maxlength="30" value="{ci}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold"> Nombre</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='nombre' name='nombre'  title="ingrese nombre" pattern="[A-Za-z ]{5,50}" maxlength="50"maxlength="30" value="{nombre}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Apellido</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='apellido' name='apellido'  title="Ingrese apellido" pattern="[A-Za-z]{5,30}" maxlength="30" value="{apellido}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Fecha de nacimiento</td>
				<td>
					<input type='date'  class="form-control"  autofocus="autofocus"    size='35' id='fecha_nac' name='fecha_nac'  title="ingrese fecha de nacimiento"  value="{fecha_nac}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Direcci&oacute;n</td>
				<td>
	                <input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='direccion' name='direccion'  title="ingrese direccion" pattern="[A-Za-z ]{5,100}" maxlength="50" value="{direccion}"  required>

				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Tel&eacute;fono</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='telefono' name='telefono'  title="ingrese telefono" pattern="[0-9]{10,15}" min="10" maxlength="15" value='{telefono}'  required>

				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Celular</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='celular' name='celular'  title="ingrese celular" pattern="[0-9]{10,15}" min="10" maxlength="15" value="{celular}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Lugar de trabajo</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='lugar_trabajo' name='lugar_trabajo'  title="ingrese el lugar de trabajo" pattern="[A-Za-z ]{5,100}" maxlength="50" value="{lugar_trabajo}"  required>
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">L&iacute;mite Cr&eacute;dito</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='limite_credito' name='limite_credito'  title="ingrese el limite de credito" pattern="[0-9]{2,30}" maxlength="30" value="{limite_credito}"  required>
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