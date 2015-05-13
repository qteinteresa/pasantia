

<script type="text/javascript">
  $(function(){
  $('#filter').focus();
  $('#search_form').submit(function(e){
    e.preventDefault();
  })
  $('#filter').keyup(function(){   
    var envio = $('#filter').val();
    var site = "<?php echo site_url();?>";
//	alert(site);
    $('#target').hide();
    // $('#resultados').html('<p class="text-info"><i class="fa fa-spinner fa-pulse fa-2x"></i></p>');
    $.ajax({
      type: 'POST',
      url: site+'/factura/factura/buscador',
      data: ('filter='+envio),
      success: function(resp){
        if(resp!=""){
          $('#resultados').html(resp);
        }
      }
    })
  })
}) 
$(document).ready(function() {
  
  $(".codigo").select2();
  
}); 
/////////////////////7

////////////////////////
$(document).ready(function () {
$("#codigo").change(function() {
    //get the selected value
	 
	
	var site = "<?php echo site_url();?>";
 
	 var selectedValue = $('#codigo').val();
	//alert(selectedValue);
    //make the ajax call
    $.ajax({
        type: 'POST',
		url: site+'/factura/factura/buscador2',
       
      //  data: (option : selectedValue),
		 data: ('codigo='+selectedValue),
        success: function(resp){
        if(resp!=""){
          $('#resultados2').html(resp);
        }
      }
    });
});
});
//////////////////////////////////////////////
function agregar() {
	var ruc=document.getElementById("codigo").value;
	var texto="" ;
   	var indice = document.formulario.codigo.selectedIndex ;
	var textoEscogido = document.formulario.codigo.options[indice].text 
   	texto += "" + textoEscogido;
	campo = '<tr><td><input style="border:0px" align="right"  type="text" size="35" name="producto1" value='+texto+'></td ><td><input style="border:0px" align="right" type="text" size="20" name="producto1" /></td><td><input style="border:0px" align="right" type="text" size="20" name="producto1" /></td><td><input style="border:0px" align="right" type="text" size="20" name="producto1" /></td><td><input style="border:0px" align="right" type="text" size="20" name="producto1" /></td><td><input style="border:0px" align="right" type="text" size="20" name="producto1" /></td><td><a href="#" onclick="javascript:borrar("+producto1+");">Borrar</a></td></tr>';
	
	$("#muestra").append(campo);
	
}
function borrar(cual) {
    $("li.email"+cual).remove();
    return false;
}
/////////////////////////////////////
function realizaProceso()
{
var valor_iva=0;
 var codigo = $('#codigo').val();
 var cantidad = $('#cantidad').val();
 var iva = $('#iva').val();


if (formulario.precio[0].checked){
var precio=formulario.precio[0].value;
}
if (formulario.precio[1].checked){
var precio=formulario.precio[1].value;
}
if (formulario.precio[2].checked){
var precio=formulario.precio[2].value;
}

switch(iva){
case "10":		valor_iva=parseInt(precio/11);break;
case "5":		valor_iva=parseInt(precio/21);break;
case "0":		valor_iva=iva;break;

}


alert("iva: "+iva+" -- valore "+valor_iva);

  
  
var parametros = {
                "codigo" : codigo,
                "cantidad" : cantidad,
				"iva" : iva,
				"precio" : precio,
				"valor_iva":valor_iva,
        };

		var site = "<?php echo site_url();?>";
		
		$.ajax({
			data: parametros,
			url: site+'/factura/factura/adding2',
			type:  'post',
			});
}

//////////////////////////////////
</script>

<section class="panel">
<form   method="get" name="formulario" action="" enctype="multipart/form-data">	
	<div class="row">
	<div class="col-lg-12" >
		<table class="table table-striped" i>
	    <thead>
			<tr>
			<h4><p class="text-info">{Encabezado}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></h4>
			</tr>    			
	    </thead>	    		
		<tbody>
			<tr id="transparente" > <td>Datos del Cliente</td >
			</tr>
			<!--  desde aqui ddatos del cliente-->
			<tr id="transparente" >
				<td>RUC/CI:</td >
				<td>Razon Social</td >
				
			</tr>
			<tr id="transparente" >
			<td>
				<form action="" method="post" name="search_form" id="search_form">
							<input class="form-control"  type="text" name="filter" 
							onfocus="autofocus" id="filter" size="25%" placeholder="Buscar RUC" 
							title="Filtar por nombre o Apellido" required>
							<input type="hidden" name="page" value="0"> 
				</form>
					
			</td >
			<td> 
			<div id="resultados" name="resultados">{cliente}&nbsp;{direccion}</div>
			
			</td >
			<td >
				
			</td >
			</tr>
			
			<!--  desde aqui ddatos del producto-->
			
			<tr id="transparente" >
				<td ></td >
			</tr>
			
			<tr id="transparente" >
				<td>Datos de los Productos</td >
			</tr>
			<tr id="transparente" >
				
				<td>Codigo-Producto:</td >
				<td>Precio: </td >
				<td>Cantidad: </td >
				<td>Impuesto: </td >
				<td>Descuento(%):</td >
				<td>Importe:</td >
			</tr>	
			<tr id="transparente" >
				<td>
				
				<select class ="codigo" name="codigo" id="codigo" onclick="ubicacion();" >
					<option value="0"></option>
					<?php 
					foreach($codigo as $fila1)
					{
					?>
					<option value="<?php echo $fila1 -> id_producto ?>">
							<?php echo $fila1 -> codigo;echo "-"; echo $fila1 -> descripcion ?>
					</option>
					<?php
					}
					?>		
				</select>
				

				</td >
				<input  id="cod" type="text" style="visibility:hidden;">
				<td>
					<div id="resultados2" name="resultados2"></div>
				</td>
				<td >
					<input type='text'  class="form-control"  autofocus="autofocus"    size='15' id='cantidad' name='cantidad'  title="Ingrese Cantidad" pattern="[0-9]{2,15}" required></td>
				</td>
				<td>
					<select  class="form-control" name="iva" id="iva">
						<option value="10">10%</option>
						<option value="5">5%</option>
						<option value="0">Exenta</option>
					</select>
				</td>
				<td>
					<input type='text'  class="form-control"  autofocus="autofocus"    size='15' id='cantidad' name='descuento'  title="Ingrese Cantidad" pattern="[0-9]{2,15}" >
				</td>
				<td><input type='text' size='12' class="form-control"  autofocus="autofocus" ><br>
				<button type="" class="btn btn-success" id="guardar" name="guardar" onclick="agregar();realizaProceso();">
					<span class="glyphicon glyphicon-plus"></span> Agregar
					</button>
					
				</td>
				
				
			</tr>
		</tbody>	
		</table>	
		<table class="table table-striped">	
			<tbody>
			<tr>
				
				<td align="center">C&oacute;digo/Producto:</td >
				<td align="center">Precio: </td >
				<td align="center">Cantidad: </td >
				<td align="center">Impuesto: </td >
				<td align="center">Descuento(%):</td >
				<td align="center">Importe:</td >
			</tr>
			</tbody>
		</table>
		
		<table class="table table-striped" >	
			<div id="muestra" >
			</div>			
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
	
