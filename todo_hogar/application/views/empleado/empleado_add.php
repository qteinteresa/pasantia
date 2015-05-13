<script src="<?php echo base_url();?>css_js/js/scrip_empleado.js"></script> 
 <section class="panel">
<form   method="post" name="formulario" id="formulario"  enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    		
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    		    			
	    		</thead>	    		
					    <tbody>
						<tr id="transparente" >
				           <td >C&eacute;dula</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='cedula' name='cedula'  title="ingrese Cedula" maxlength="15"  pattern="[0-9]{0,15}" value="<?php echo set_value('cedula');?>"  required >
								<?php echo form_error('cedula'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Nombres</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='nombre_empleado' name='nombre_empleado'  maxlength="30"  title="ingrese nombre" pattern="[A-Za-z]{2,30}" value="<?php echo set_value('nombre_empleado');?>"  required >
								<?php echo form_error('nombre_empleado'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Apellidos</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='apellido_empleado' name='apellido_empleado' maxlength="30"  title="iSngrese apellido" pattern="[A-Za-z,]{2,30}" value="<?php echo set_value('apellido_empleado');?>"  required >
								<?php echo form_error('apellido_empleado'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Direcci&oacute;n</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='direccion' name='direccion' maxlength="50"  title="ingrese direccion" pattern="[A-Za-z,0-9,\s]{2,50}" value="<?php echo set_value('direccion');?>"  required >
								<?php echo form_error('direccion'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Tel&eacute;fono</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='telefono' name='telefono' maxlength="11"  title="ingrese telefono" pattern="[0-9]{0,15}" value="<?php echo set_value('telefono');?>"  required >
								<?php echo form_error('telefono'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Sueldo</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='sueldo' name='sueldo' maxlength="15"  title="ingrese sueldo" pattern="[0-9]{2,15}" value="<?php echo set_value('sueldo');?>"  required >
								<?php echo form_error('sueldo'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Cargo</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='cargo' name='cargo' maxlength="50"  title="ingrese el cargo" pattern="[A-Za-z,0-9,\s]{2,50}" value="<?php echo set_value('cargo');?>"  required >
								<?php echo form_error('cargo'); ?>	
							</td>
						</tr>
						
						<tr id="transparente" >
											
			           			<td >		
			          				 <i class="icon_profile"></i> Usuario	
			           			</td>
		
			           		<div>
								<td >		

										<input type="checkbox" name="conditions" id="conditions" class="form_control"  />	

								</td>
						</tr>
					
				 			<tr id="target1">
			         			 			<td style="font-weight:bold;  font-weight:bold">Usuario</td>
			         			 <td><input type='text' size='35'   class="form-control" id='usuario'  maxlength="15"  id="usuario" name='usuario' value="<?php echo set_value('usuario');?>" pattern="[A-Za-z ]{3,10}" placeholder="Usuario Nombre" required >
			         			 <?php echo form_error('usuario'); ?>	</td>
			     			 </tr>
				
				
								<tr id="target2">
						            <td style="font-weight:bold;  font-weight:bold">Contraseña</td>
						        	<td><input type='text' size='35'   class="form-control" id='pass'  maxlength="15"  id="pass" name='pass' value="<?php echo set_value('pass');?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required placeholder="Número , letra minúscula y mayúscula MINIMO 6 CARACTERES"  title="Debe contener al menos un número y una letra minúscula y mayúscula , y al menos 6 o más caracteres" >
						        	<?php echo form_error('pass'); ?>	</td>
								</tr>
				

						
		    </tbody>
		</table>

         
<div id="targe">
		<table align='center' id="transparente" >	
			<button type="submit" name="Guardar" id="button" value="Guardar" class="btn btn-success" onClick="this.form.action ='<?php echo site_url();?>/empleado/empleado/adding';">
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
<div id="target3">
		<!-- tabla usuarios -->
		<table align='center' id="transparente" >	
			<button type="submit" name="Guardar" id="button" value="Guardar" class="btn btn-success" onClick="this.form.action ='<?php echo site_url();?>/empleado/empleado/adding2';">
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
	</div>


	</form>
	</section>
	
