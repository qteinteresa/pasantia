 <section class="panel">

<form   method="post" accept-charset="utf-8" name="formulario" action="<?php echo base_url();?>index.php/Categoria/categoria/save_edit" enctype="multipart/form-data">	


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
			   
				<td>
					<input type='hidden' size='35'  class="form-control" id='id_categoria'  name='id_categoria'   value="{id_categoria}" readonly="">					
				</td>				
			</tr>
			<tr id="transparente">
			    <td style="font-weight:bold;  font-weight:bold">
					Descripcion de la Categoria
				</td>
				<td>
					<textarea  required rows="3" cols="50"  class="form-control"  autofocus="autofocus"   placeholder="categoria"  id='categoria' name='categoria'  title="Ingrese una categoria" type="textarea" pattern="[A-Za-z ]{5,50}" maxlength="50" >{categoria}</textarea>

					<!-- <input type='text' size='35'   class="form-control" id='categoria'  pattern="[A-Za-z ]{5,100}" maxlength="100" name='categoria' > -->
					 <?php echo form_error('categoria'); ?>
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