         
<!-- /////////////////////////////////////////////////////////             -->      
         
<div id="refreshData">
             <div class="row" id="target" >
                  <div class="col-lg-12">                     
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr class="active">                                   
                                <th><i class ="glyphicon glyphicon-qrcode"></i> R.U.C.</th>
                                <th><i class ="glyphicon glyphicon-user"></i> Raz&oacute;n Social</th>
                                <th><i class ="icon_pin_alt"></i> Direcci&oacute;n</th>
                                <th><i class ="icon_mobile"></i> Tel&eacute;fono</th>
                                <th><i class ="icon_mail_alt"></i>Mail</th>
                                <th><i class ="glyphicon glyphicon-globe"></i>P&aacute;gina Web</th>
                                <th><i class ="glyphicon glyphicon-piggy-bank"></i>Cuenta B</th>
                                <th><i class ="glyphicon glyphicon-user"></i>Vendedor</th>
                                <th><i class ="glyphicon glyphicon-usd"></i>L&iacute;mite Cr&eacute;dito</th>
                                <th><i class ="icon_cogs"></i> Action</th>
                              </tr>
                             </thead>
                             <tbody>
                         
                                {formulario}
                                 <tr class="" id="userRecordTabel" > 
             
                                <td>     {ruc}                   </td>
                                <td>    {razon_social}           </td>
                                <td>    {direccion}              </td>
                                <td>    {telefono}               </td>
                                <td>    {mail}                   </td>
                                <td>    {pag_web}                </td>
                                <td>    {cuenta_bancaria}        </td>
                                <td>    {vendedor}               </td>
                                <td>    {limite_credito}         </td>								
                                 <td>
                                  <div class="btn-group">
                                   <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
                                      <a class="btn btn-success" href="<?php echo base_url();?>index.php/proveedor/proveedor/edit/{id_proveedor}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?php echo base_url();?>index.php/proveedor/proveedor/delete/{id_proveedor}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                             </tr>
                                {/formulario}
                                                         
                           </tbody>
                        </table>
                
                  </div>
            
          
<ul class="pager">
  {pagination} 
</ul>
</div>
</div>



