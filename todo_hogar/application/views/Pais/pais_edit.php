 <section class="panel">
 <?php echo validation_errors();?>
<form   method="get" accept-charset="utf-8" name="formulario" action="<?= base_url();?>index.php/Pais/pais/save_edit" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh fa-spin "></i></span></p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
			{formulario}		        
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">
					Id			
				</td>
				<td>
					<input type='text' size='35'  class="form-control" id='Id_Pais'  name='Id_Pais' value="{Id_Pais}" readonly="">					
				</td>				
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">
					Nombre del Pais
				</td>
				<td>
					<input type='text' size='35'   class="form-control" id='Descripcion_Pais'  onKeyDown=""  name='Descripcion_Pais' value="{Descripcion_Pais}">
					
				</td>
				
			</tr>
			{/formulario}
					    </tbody>
		</table>
		<table align='center' id="transparente" >	
		<button type="submit" class="btn btn-info">
    			<i class="fa fa-refresh fa-spin "></i> Actualizar
     	</button>&nbsp;&nbsp;&nbsp;				
	
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">
    <span class="glyphicon glyphicon-floppy-remove"></span> Cancelar
      </button>
      </table>	
     	</div>			
	</div>
</div>	
	</form>
</section>