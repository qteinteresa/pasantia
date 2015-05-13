 <section class="panel">
<script type='text/javascript'>
		// BASE URL
		var site = "<?php echo site_url();?>";

$(function(){
	$('.autocomplete2').autocomplete2({
		serviceUrl: site+'/Producto/producto/busqueda_proveedor',

		onSelect: function (suggestions) {
			document.formulario.id_proveedor.value = suggestions.data;
			
			}
	});	
});
$(function(){
	$('.autocomplete').autocomplete({
		serviceUrl: site+'/Producto/producto/busqueda_categoria',

		onSelect: function (suggestions) {
			document.formulario.id_categoria.value = suggestions.data;
			
		}
	});	

});
// 	function comprobarClave(){ 
//    	cantidad = document.formulario.cantidad.value 
//    	stock_minimo = document.formulario.stock_minimo.value 

//    	if (stock_minimo > cantidad)  {
//       	alert("El Stock Supera su cantidad") 
//    	}
//    	else {
//    	}
      	
// } 

	
	
</script>

	


<form   method="post" name="formulario" id="formulario" action="<?php echo base_url();?>index.php/Producto/producto/adding" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-0" >
	    		<table class="table table-striped" >
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
					     
					     
						
						<tr id="transparente" >
				           	<td >
				           		<p >Codigo Barra</p>
				           	</td>
				            <td>
				            	<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' placeholder="Codigo barra" id='cod_barra' name='cod_barra'  title="Ingrese una CODIGO BARRA" pattern="[0-9]{3,15}" min="3" maxlength="15"  value="<?php echo set_value('cod_barra');?>" required>
				           	<?php echo form_error('cod_barra'); ?>	
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Precio Normal: gs</p>
							</td>
				           <td>
				           		<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' placeholder="Precio Normal" id='precio_normal' name='precio_normal'  title="Ingrese PRECIO" pattern="[0-9]{3,10}" min="3" maxlength="10" value="<?php echo set_value('precio_normal');?>" >
						  	<?php echo form_error('precio_normal'); ?>
						   </td>
						</tr>
						<tr id="transparente" >
				           <td >
				           		<p >Precio Preferencial: gs</p>
				           </td>
				           <td>
				           	<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' placeholder="Precio Preferencial" id='precio_pref' name='precio_pref'  title="Ingrese PRECIO" pattern="[0-9]{3,10}" min="3" maxlength="10" value="<?php echo set_value('precio_pref');?>" >
				           <?php echo form_error('precio_pref'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Precio Vip: gs</p>
							</td>
							<td>
				           	<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' placeholder="Precio Vip" id='precio_vip' name='precio_vip'  title="Ingrese PRECIO" pattern="[0-9]{3,10}"  min="3" maxlength="10" value="<?php echo set_value('precio_vip');?>" >
				           <?php echo form_error('precio_vip'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Cantidad</p>
							</td>
				            <td>
				            <input required type="text"   class="form-control"  autofocus="autofocus"    size='20' placeholder="Categoria" id='cantidad' name='cantidad'  title="Ingrese CANTIDAD" pattern="[0-9]{1,10}" min="1" maxlength="10" value="<?php echo set_value('cantidad');?>" >
				           <?php echo form_error('cantidad'); ?>
				           </td>
						</tr>

						<tr id="transparente" >
				           	<td >
				           		<p >Descripcion Producto</p> 
				           	</td>
				     
				           	<td> 
				           	<textarea  required rows="3" cols="50"  class="form-control"  autofocus="autofocus"   placeholder="Descripcion"  id='descripcion' name='descripcion'  title="Ingrese una Descripcion" type="textarea" pattern="[A-Za-z,0-9,\s]{2,50}" maxlength="50" ><?php echo set_value('descripcion');?></textarea>
				           <?php echo form_error('descripcion'); ?>
				           </td>
				        </tr>
				        <!-- ////////////////////////////////// -->

				        </tbody>
			</table>
	</div>
	<div class="col-md-6 col-md-offset-0" >
			<table class="table table-striped">
			<thead>
	    			<tr>
	    			<h4><p class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    			</tr>    			
	    		</thead>	
				        <tbody>
						<tr id="transparente" >
				           <td >
				           		<p >Stock Minimo</p>
				           </td>
				           <td>
				           		<input required type="text"  class="form-control"  autofocus="autofocus"    size='20' placeholder="STOCK Minimo" id='stock_minimo' name='stock_minimo'  title="Ingrese STOCK MINIMO" pattern="[0-9]{1,10}" min="1" maxlength="10"  value="<?php echo set_value('stock_minimo');?>"/>
				           <?php echo form_error('stock_minimo'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Descuento</p>
							</td>
				            <td>
				            	<input  type="text"  class="form-control"      size='20' placeholder="Descuento" id='descuento' name='descuento'  title="Ingrese Descuento" pattern="[0-9]{1,10}" min="1" maxlength="10" value="<?php echo set_value('descuento');?>"/>
				           <?php echo form_error('descuento'); ?>
				           </td>



						</tr>
						<tr id="transparente" >
							<td >
								<p >Iva %</p>
							</td>
							<td>
								<select required name="iva" id="iva" class="form-control"  style='background-color:transparent'   title="Seleciona Categoria">
									<option  value=""></option>
									<option value="10" <?php echo set_select('iva','10'); ?>>10%</option>
									<option value="5" <?php echo set_select('iva','5'); ?>>5%</option>
								</select>
								<?php echo form_error('iva'); ?>
							</td>
						</tr>
						</tr>
						<tr class="transparente">
							<td >
								<p >Fecha</p>
							</td>
							<td>

								<input required type="date" name="fecha" id="fecha" class="form-control"    value="<?php echo set_value('fecha');?>"  title="Seleccione Fecha">
								<?php echo form_error('fecha'); ?>
							</td>
						</tr>
						<tr id="transparente" >
				           <td >
				           		<p >Categoria</p>
				           </td>
							<td>
								<input required type='text' id='autocomplete' class="autocomplete" placeholder="Categoria"   style='background-color:transparent'  autocomplete="off" title="Seleciona Categoria"/>
		               			<input required id="id_categoria" name="id_categoria" class="form-control" placeholder="id_categoria" type="hidden"  />
								<?php echo form_error('id_categoria'); ?>
							</td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Proveedor</p>
							</td>
							<td>
								<input required type='text' id='autocomplete2' class="autocomplete2" placeholder="Proveedor"   style='background-color:transparent'  autocomplete="off" title="Seleciona proveedor"/>
		                		<input required id="id_proveedor" name="id_proveedor" class="form-control" placeholder="id_proveedor" type="hidden"  />
				        		 <?php echo form_error('id_proveedor'); ?>
				           </td>
						</tr>
				    </tbody>
		</table>
</div>
		<div class="col-md-12 col-md-offset-4" >
		<table align='center' id="transparente" >	
		<button type="submit" class="btn btn-success"  onClick="comprobarClave()" >
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
     			
	

	</form>
	</section>
	

