<!-- Script ajax filtrado -->
<script type="text/javascript">
  $(function(){
  $('#filter').focus();
  $('#search_form').submit(function(e){
    e.preventDefault();
  })
  $('#filter').keyup(function(){   
    var envio = $('#filter').val();
    var site = "<?php echo site_url();?>";
    $('#target').hide();//oculta un div que esta en la vista
    // $('#resultados').html('<p class="text-info"><i class="fa fa-spinner fa-pulse fa-2x"></i></p>');
    $.ajax({
      type: 'POST',
      url: site+'/Producto/producto/buscador',
      data: ('filter='+envio),
      success: function(resp){
        if(resp!=""){
          $('#resultados').html(resp);
        }
      }
    })
  })
})
</script>

       <div class="col-md-12 col-md-offset-0">
          <table class=""  >
            <tr id="transparente" >            
              <td>
                <h4> <p class="text-info">{ENCABEZADO}
                 &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                
                </p></h4> 
              </td>
              
               <td>            
                  <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-primary hidden-sm" >
                           <span class="glyphicon glyphicon-search"></span>

                        </button>
                      </span>
                       <form action="" method="post" name="search_form" id="search_form">
                    <input class="form-control"  type="text" name="filter" onfocus="autofocus" id="filter" size="25%" placeholder="Filtar por Categoria" title="Filtar por Razon Social" required>
                     <input type="hidden" name="page" value="0"> 
                  </form>
                  </div>
              </td> 
              <td>
                              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
              </td>

              <td>
                              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
              </td> 
                <td>                 
                  <a class="btn btn-primary" href="<?php echo base_url();?>index.php/Producto/producto/add">Agregar<i class="icon_plus_alt2"></i></a> 
                 
               </td>                 
            </tr>            
          </table>        
            </div>         
  <div id="resultados"></div>