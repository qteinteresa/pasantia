 <section class="panel">

<form   method="post" accept-charset="utf-8" name="formulario" action="<?php echo base_url();?>index.php/empleado/empleado/save_edit" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    			</tr>    			
	    		</thead>	    		
					  {formulario}		        
			<tr id="transparente">
			   
				<td>
				<input type='hidden' size='35'  class="form-control" id='id_empleado'  name='id_empleado' value="{id_empleado}" readonly="">
	
				</td>				
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">C&eacute;dula</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='cedula' name='cedula'  title="ingrese Cedula" maxlength="15"  pattern="[0-9]{0,15}" value="{ci}"  required >
					<?php echo form_error('cedula'); ?>	
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Nombres</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='nombre_empleado' name='nombre_empleado'  maxlength="30"  title="ingrese nombre" pattern="[A-Za-z]{2,30}" value="{nombre}"  required >
					<?php echo form_error('nombre_empleado'); ?>					</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Apellidos</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='apellido_empleado' name='apellido_empleado' maxlength="30"  title="iSngrese apellido" pattern="[A-Za-z,]{2,30}" value="{apellido}"  required >
     				<?php echo form_error('apellido_empleado'); ?>	
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Direcci&oacute;n</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='direccion' name='direccion' maxlength="50"  title="ingrese direccion" pattern="[A-Za-z,0-9,\s]{2,50}" value="{direccion}"  required >
					<?php echo form_error('direccion'); ?>	
				</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Tel&eacute;fono</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='telefono' name='telefono' maxlength="15"  title="ingrese telefono" pattern="[0-9]{0,15}" value="{telefono}"  required >
					<?php echo form_error('telefono'); ?>					</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Sueldo</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='sueldo' name='sueldo' maxlength="15"  title="ingrese sueldo" pattern="[0-9]{2,15}" value="{sueldo}"  required >
					<?php echo form_error('sueldo'); ?>					</td>
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">Cargo</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='cargo' name='cargo' maxlength="50"  title="ingrese el cargo" pattern="[A-Za-z,0-9,\s]{2,50}" value="{cargo}"  required >
					<?php echo form_error('cargo'); ?>					</td>
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