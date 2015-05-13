$(function(){
	    $('#target1').hide();
	    $('#target2').hide();
		$('#target3').hide();
		$("#usuario").attr("disabled", "disabled");
		$("#pass").attr("disabled", "disabled");


    $('#conditions').click(function(){    		
        if($('input[name=conditions]').is(':checked')){
        	if($("#cedula").val().length == "") {
        		alert("Cedula obligatorio"); 
        		$("#cedula").focus(); 
        		return false;
        	}
        	if($("#nombre_empleado").val().length == "") { 
        		alert("El nombre obligatorio"); 
        		$("#nombre_empleado").focus();
        		return false;
        	}
        	if($("#apellido_empleado").val().length == "") {
        		 alert("El apellido obligatorio"); 
        		 $("#apellido_empleado").focus();
        		 return false;
        	}
        	if($("#direccion").val().length == "") {
        		 alert("Direccion obligatorio"); 
        		 $("#direccion").focus();
        		 return false;
        	}
        	if($("#telefono").val().length == "") {
        		 alert("Telefono  obligatorio"); 
        		 $("#telefono").focus();
        		 return false;
        	}
        	if($("#sueldo").val().length == "") {
        		 alert("Sueldo obligatorio"); 
        		 $("#sueldo").focus();
        		 return false;
        	}
        	if($("#cargo").val().length == "") {
        		 alert("Cargo obligatorio"); 
        		 $("#cargo").focus();
        		 return false;
        	}  

  
	        			   $('#targe').hide(); 
	        			   $('#target1').show();
	  					   $('#target2').show();
						   $('#target3').show();
	        		 $('#button').attr("disabled", true); 
	        		 $("#usuario").removeAttr("disabled"); 
	        		 $("#pass").removeAttr("disabled");    		   
	                $('a[data-toggle="modal"]').click();
	                $('a[href="#modal"]').click();

	         return true;

        }
        else{ ///sino esta seleccionado el chexboock no muestro el registro de usuario
        $('#targe').show();
        $("#button").removeAttr("disabled"); 
        $('#target1').hide();
	    $('#target2').hide();
		$('#target3').hide();
		$("#usuario").attr("disabled", "disabled");
		$("#pass").attr("disabled", "disabled");
             
        }
    });
	

});

