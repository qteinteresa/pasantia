 <section class="panel">
<form   method="post" name="formulario" action="<?php echo base_url();?>index.php/Categoria/categoria/adding" enctype="multipart/form-data">	


		<div class="row featurette">
	    	<div class="col-md-6 col-md-offset-2" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span></p></h4>
	    			</tr>    			
	    		</thead>	    		
					    <tbody>
					        
						<tr id="transparente" >
				           <td >Descripcion Categoria</td>
							<td >
								<textarea  required rows="3" cols="50"  class="form-control"  autofocus="autofocus"   placeholder="categoria"  id='categoria' name='categoria'  title="Ingrese una categoria" type="textarea" pattern="[A-Za-z ]{5,50}" maxlength="50" ><?php echo set_value('categoria');?></textarea>
						
							 <?php echo form_error('categoria'); ?>
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
	
