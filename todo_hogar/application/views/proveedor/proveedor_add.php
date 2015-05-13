 <section class="panel">
<form   method="post" name="formulario" action="<?php echo base_url();?>index.php/proveedor/proveedor/adding" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
					        
						
						<tr id="transparente" >
				           <td >R.U.C.</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Ruc"     size='35' id='ruc' name='ruc'  title="ingrese el ruc" pattern="[0-9]{3,15}" min="3" maxlength="15"  value="<?php echo set_value('ruc');?>"  required>
								<?php echo form_error('ruc'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Raz&oacute;n Social</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Razon Social"     size='35' id='razon_social' name='razon_social'  title="ingrese la razon social" pattern="[A-Za-z\S]{2,20}" maxlength="20"  value="<?php echo set_value('razon_social');?>" required>
								<?php echo form_error('razon_social'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Direcci&oacute;n</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Direccion"     size='35' id='direccion' name='direccion'  title="Ingrese direccion" pattern="[A-Za-z\S]{2,30}" maxlength="30"  value="<?php echo set_value('direccion');?>" required>
								<?php echo form_error('direccion'); ?>	
							</td>
						</tr>
						
						<tr id="transparente" >
				           <td >Tel&eacute;fono</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Telefono"     size='35' id='telefono' name='telefono'  title="ingrese telefono" pattern="[0-9]{10,11}" maxlength="11"  value="<?php echo set_value('telefono');?>" required>
								<?php echo form_error('telefono'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Correo</td>
							<td >
								<input type='email'  class="form-control"  autofocus="autofocus" placeholder="Ejemplo@correo.com"     size='35' id='mail' name='mail'  title="ingrese mail" pattern="[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}" maxlength="30"  value="<?php echo set_value('mail');?>" required>
								<?php echo form_error('mail'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >P&aacute;gina Web</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="www.mipaia.comm"     size='35' id='pag_web' name='pag_web'  title="ingrese el pagina" pattern="[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)( [a-zA-Z0-9\-\.\?\,\'\/\\\+&%\$#_]*)?$" maxlength="20"  value="<?php echo set_value('pag_web');?>" >
								<?php echo form_error('pag_web'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Cuenta Bancaria</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Cuenta Bancaria"     size='35' id='cuenta_bancaria' name='cuenta_bancaria'  title="ingrese cuenta bancaria" pattern="[0-9]{0,15}" maxlength="15"  value="<?php echo set_value('cuenta_bancaria');?>">
								<?php echo form_error('cuenta_bancaria'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >Nombre del Vendedor</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Vendedor"     size='35' id='vendedor' name='vendedor'  title="ingrese el nombre del vendedor" pattern="[A-Za-z\S]{2,30}"  maxlength="35"  value="<?php echo set_value('vendedor');?>" required>
								<?php echo form_error('vendedor'); ?>	
							</td>
						</tr>
						<tr id="transparente" >
				           <td >L&iacute;mite de Cr&eacute;dito</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus" placeholder="Limite  de Credito"     size='35' id='limite_credito' name='limite_credito'  title="ingrese el nCredito limite" pattern="[0-9]{2,10}"  maxlength="10"  value="<?php echo set_value('limite_credito');?>" required>
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
	
