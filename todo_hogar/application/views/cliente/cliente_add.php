<section class="panel">
<form   method="post" name="formulario" action="<?php echo base_url();?>index.php/cliente/cliente/adding" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
					        
						
						<tr id="transparente" >
				           <td >C.I</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='ci' name='ci'  title="ingrese numero de cedula" pattern="[0-9]{5,30}" min="5" maxlength="30" value="<?php echo set_value('ci');?>"  required placeholder="Cedula">
								 <?php echo form_error('ci'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Nombre</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='nombre' name='nombre'  title="ingrese nombre"pattern="[A-Za-z ]{5,50}" maxlength="50" maxlength="30" value="<?php echo set_value('nombre');?>"  required placeholder="Nombre">
								 <?php echo form_error('nombre'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Apellido</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='apellido' name='apellido'  title="Ingrese apellido" pattern="[A-Za-z ]{5,50}" maxlength="50" maxlength="30" value="<?php echo set_value('apellido');?>"  required placeholder="Apellido">
								 <?php echo form_error('apellido'); ?>
							</td>
						</tr>
						
						<tr id="transparente" >
				           <td >Fecha de nacimiento</td>
							<td >
								<input type='date'  class="form-control"  autofocus="autofocus"    size='35' id='fecha_nac' name='fecha_nac'  title="ingrese fecha de nacimiento"  value="<?php echo set_value('fecha_nac');?>"  required placeholder="Fecha de nacimeinto">
								 <?php echo form_error('fecha_nac'); ?>
								
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Direccion</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='direccion' name='direccion'  title="ingrese direccion" pattern="[A-Za-z ]{5,50}" maxlength="50" value="<?php echo set_value('direccion');?>"  required placeholder="Direccion">
								 <?php echo form_error('direccion'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Telefono</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='telefono' name='telefono'  title="ingrese telefono" pattern="[0-9]{10,15}" min="10" maxlength="15" value="<?php echo set_value('telefono');?>"  required placeholder="Telefono">
								 <?php echo form_error('telefono'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Celular</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='celular' name='celular'  title="ingrese celular" pattern="[0-9]{10,15}" min="10" maxlength="15" value="<?php echo set_value('celular');?>"  required placeholder="Celular">
								 <?php echo form_error('celular'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Lugar de trabajo</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='lugar_trabajo' name='lugar_trabajo'  title="ingrese el lugar de trabajo" pattern="[A-Za-z ]{5,100}" maxlength="50" value="<?php echo set_value('lugar_trabajo');?>"  required placeholder="Lugar de Trabajo">
								 <?php echo form_error('lugar_trabajo'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >L&iacute;mite de Cr&eacute;dito</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='limite_credito' name='limite_credito'  title="ingrese el limite de credito" pattern="[[0-9]{2,30}" maxlength="30" value="<?php echo set_value('limite_credito');?>"  required placeholder="Limite  de Credito">
								 <?php echo form_error('limite_credito'); ?>
							</td>
						</tr>

					    </tbody>
		</table>
		<table align='center' id="transparente" >	
		<button type="submit" class="btn btn-success">
    			<span class="glyphicon glyphicon-floppy-disk"></span> Guardar
     	</button>&nbsp;&nbsp;&nbsp;				
		<button type="reset" class="btn btn-info">
   				 <i class="fa fa-refresh "></i> Limpiar
      	</button>&nbsp;&nbsp;&nbsp;		
		<button type="button" class="btn btn-danger" onClick="javascript:history.go(-1)">
    <span class="glyphicon glyphicon-floppy-remove"></span> Cancelar
      </button>	
      		

</table>	
     	</div>			
	</div>

	</form>
	</section>
	