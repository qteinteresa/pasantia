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

	
	
</script>
 <section class="panel">

<form   method="post" accept-charset="utf-8" name="formulario" action="<?php echo base_url();?>index.php/Producto/producto/save_edit" enctype="multipart/form-data">	


		<div class="row featurette">
			    	<div class="col-md-6 col-md-offset-0" >
	    		<table class="table table-striped" >
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
					   {formulario}     
<!-- 						<tr id="transparente" >
				           <td >
				           		<p >Codigo:</p>
				           </td>
				           <td>
				           		<input type='number'  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' id='codigo' name='codigo'  value="{codigo}" required>
				           </td>
						</tr> -->
						<tr id="transparente" >
				           	<td >
				           		<p >Codigo Barra</p>
				           	</td>
				            <td>
				            <input type='hidden'  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' id='codigo' name='codigo'  value="{codigo}" required>
				            <input class="form-control" type='hidden' size='20'readonly id="id_produc_prove"  name='id_produc_prove' value="{id_produc_prove}" title="">
				                <input class="form-control" type='hidden' size='20'readonly id="id_producto"  name='id_producto' value="{id_producto}" title="">
				            	<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' id='cod_barra' name='cod_barra'  title="Ingrese una CODIGO BARRA" pattern="[0-9]{3,20}" min="3" maxlength="20"  value="{cod_barra}" required>
				           		<?php echo form_error('cod_barra'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Precio Normal: gs</p>
							</td>
				           <td>
				           		<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' id='precio_normal' name='precio_normal'  title="Ingrese PRECIO" pattern="[0-9]{3,10}" min="3" maxlength="10" value="{precio_normal}" >

						  	<?php echo form_error('precio_normal'); ?>
						   </td>
						</tr>
						<tr id="transparente" >
				           <td >
				           		<p >Precio Preferencial: gs</p>
				           </td>
				           <td>
				           	<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' id='precio_pref' name='precio_pref'  title="Ingrese PRECIO" pattern="[0-9]{3,10}" min="3" maxlength="10" value="{precio_pref}" >

				           <?php echo form_error('precio_pref'); ?>
							</td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Precio Vip: gs</p>
							</td>
							<td>
				           	<input required type="text"  step="0.01" step="any" class="form-control"  autofocus="autofocus"    size='20' id='precio_vip' name='precio_vip'  title="Ingrese PRECIO" pattern="[0-9]{3,10}"  min="3" maxlength="10" value="{precio_vip}" >

				           <?php echo form_error('precio_vip'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Cantidad</p>
							</td>
				            <td>
				            <input required type="text"   class="form-control"  autofocus="autofocus"    size='20' id='cantidad' name='cantidad'  title="Ingrese CANTIDAD" pattern="[0-9]{1,10}" min="1" maxlength="10" value="{cantidad}" >

				           <?php echo form_error('cantidad'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
				           	<td >
				           		<p >Descripcion Producto</p> 
				           	</td>
				     
				           	<td> 
				           	<textarea  required rows="3" cols="50"  class="form-control"  autofocus="autofocus"     id='descripcion' name='descripcion'  title="Ingrese una Descripcion" type="textarea" pattern="[A-Za-z ]{5,100}" maxlength="100" >{descripcion}</textarea>
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
				           		<input required type="text"  class="form-control"  autofocus="autofocus"    size='20' id='stock_minimo' name='stock_minimo'  title="Ingrese STOCK MINIMO" pattern="[0-9]{1,10}" min="1" maxlength="10"  value="{stock_minimo}">

				           <?php echo form_error('stock_minimo'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Descuento</p>
							</td>
				            <td>
								<input  type="text"  class="form-control"  autofocus="autofocus"    size='20' id='descuento' name='descuento'  title="Ingrese Descuento" pattern="[0-9]{1,10}" min="1" maxlength="10" value="{descuento}">
				           		<?php echo form_error('descuento'); ?>
				           </td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Iva %</p>
							</td>
							<td>
								<select name="iva" id="iva" class="form-control"  style='background-color:transparent'  required="required" title="Seleciona Categoria">
									<option value="{iva}">{iva}%</option>
									<option value="10">10%</option>
									<option value="5">5%</option>
								</select>
								<?php echo form_error('iva'); ?>
							</td>
						</tr>
							<tr id="transparente" >
							<td >
								<p >Fecha</p>
							</td>
				            <td>
								<input type='date' size='35'   class="form-control" id='fecha'  onKeyDown=""  name='fecha' value="{fecha}" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" required></td>
				           <?php echo form_error('fecha'); ?>
				           </td>

						</tr>
						{/formulario}
						<tr id="transparente" >
				           <td >
				           		<p >Categoria</p>
				           </td>
							<td>
								{for1}
								<input type='text' id='autocomplete' class="autocomplete" placeholder="Categoria" value="{categoria}"  style='background-color:transparent' autocomplete="off" required="required" title="Seleciona Categoria"/>
		               			<input id="id_categoria" name="id_categoria" class="form-control" placeholder="id_categoria" value="{id_categoria}" type="hidden"  />
								{/for1}
								<?php echo form_error('id_categoria'); ?>
							</td>
						</tr>
						<tr id="transparente" >
							<td >
								<p >Proveedor</p>
							</td>
							<td>
								{for2}
								<input type='text' id='autocomplete2' class="autocomplete2" placeholder="Proveedor"  value="{razon_social}" style='background-color:transparent' autocomplete="off" required="required" title="Seleciona proveedor"/>
		                		<input id="id_proveedor" name="id_proveedor" class="form-control" placeholder="id_proveedor"  value="{id_proveedor}"  type="hidden"  />

								{/for2}
								 <?php echo form_error('id_proveedor'); ?>
				           </td>


						</tr>

					    </tbody>
		</table>
</div>
		<div class="col-md-12 col-md-offset-4" >
		<table align='center' id="transparente" >	
		<button type="submit" class="btn btn-info">
    			<i class="fa fa-refresh  "></i> Actualizar
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