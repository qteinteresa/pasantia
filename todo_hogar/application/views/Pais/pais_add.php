 <section class="panel">
<form   method="get" name="formulario" action="<?= base_url();?>index.php/Pais/pais/adding" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh fa-spin "></i></span></p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
					        
						<tr id="transparente" >
				           <td >Nombre de Pais</td>
							<td >
								<input type='text'  class="form-control"  autofocus="autofocus"    size='35' id='Descripcion_Pais' name='Descripcion_Pais'  title="Ingrese una Descripcion" pattern="[A-Za-z ]{5,100}" required>
							</td>
						</tr>

					    </tbody>
		</table>
		<table align='center' id="transparente" >	
		<button type="submit" class="btn btn-success">
    			<span class="glyphicon glyphicon-floppy-disk"></span> Guardar
     	</button>&nbsp;&nbsp;&nbsp;				
		<button type="reset" class="btn btn-info">
   				 <i class="fa fa-refresh fa-spin "></i> Limpiar
      	</button>&nbsp;&nbsp;&nbsp;		
		<button type="button" class="btn btn-danger" onClick="javascript:history.go(-1)">
    <span class="glyphicon glyphicon-floppy-remove"></span> Cancelar
      </button>			

</table>	
     	</div>			
	</div>

	</form>
	</section>
	
