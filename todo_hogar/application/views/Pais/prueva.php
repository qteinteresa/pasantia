
<body>
<form  role="form" method='post' name="formulario" action="<?= base_url();?>index.php/Pais/pais/add">	
		<div class="row featurette">
	    	<div class="col-md-9 col-md-offset-1" >
	    		<table class="table table-striped" i>
	    		<thead>
	    			<tr>
	    			<h4><p class="text-info">{ENCABEZADO}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh fa-spin "></i></span></p></h4>
	    			</tr>    			
	    		</thead>	    		
	    			   <thead>
	    			   		<tr>
					            <th>ID</th>
					            <th>&nbsp;&nbsp;&nbsp;Nombre de Pais</th>
					            
					            <th>Editar</th>
					            
					            <th>Eliminar</th>

					        </tr>
					    </thead>
					    <tbody>
						{formulario}
					       <tr id="transparente"  >
					       		<td>	
									<div style="font-weight:bold;   font-weight:bold" >
										{Id_Pais}
									</div>							
								</td>
					            <td>
					            <div style="font-weight:bold;  font-weight:bold" >
					            	    {Descripcion_Pais}
					            </div>
					            	
					            </td>	
					            <td>			            	
					            	<a href="<?= base_url();?>index.php/Pais/pais/edit/{Id_Pais}" class="btn my-new-button-class"> <span class="glyphicon glyphicon-check"></span> </a>

					            </td>
					            <td>			            	
					            	<a href="<?= base_url();?>index.php/Pais/pais/delete/{Id_Pais}" class="btn my-new-button-class"> <span class="glyphicon glyphicon-trash"></span> </a>			            	
					            </td>
						</tr>
						{/formulario}
					    </tbody>
		</table>
		<button type="submit" class="btn btn-primary">Agregar&nbsp;<i class="fa fa-plus-square fa-1x"></i></button>


		

	</table>	
     	</div>			
	</div>
</div>	
	
	
	

	</form>
	<div class="btn-group">
<ul class="pager">
 
   <li class="active">
  	{pagination} 
  	</li>
  
</ul>
</div>
	
