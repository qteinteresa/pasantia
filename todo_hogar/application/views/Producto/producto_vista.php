

<!-- ////////////////////////////////////////////////////////////////////////////////////////////            -->
<div id="refreshData">
             <div class="row" id="target" >
                  <div class="col-lg-12">                     
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr class="active">  
                                 <th>   <i class ="glyphicon glyphicon-qrcode"></i> Codigo  </th>
                                 <th>   <i class="fa fa-barcode"></i> Codigo Barra         </th>
                                 <th>   <i class="fa fa-list-ol"></i> Cantidad             </th>
                                 <th>   <i class="fa fa-hdd-o"></i> Stock Min            </th>
                                 <th>   <i class="fa fa-thumb-tack"></i> Categoria            </th>
                                 <th>   <i class="fa fa-user-secret"></i> Proveedor           </th>
                                 <th>   <i class="fa fa-calendar"></i> Fecha           </th>
                                 <th>    <i class="fa fa-search"></i>  Mas Detalles        </th>
                                 <th>  <i class ="icon_cogs"></i>   Action               </th>
                              </tr>
                             </thead>
                             <tbody>                       
                                {formulario}
                                 <tr class="" id="userRecordTabel" >        
                                 
                                 <td>    {codigo}             </td>
                                 <td>    {cod_barra}          </td>                                
                                 <td>    {cantidad}           </td>
                                 <td>    {stock_minimo}       </td>
                                 <td>    {categoria}          </td>
                                 <td>    {razon_social}       </td>
                                   <td>    {fecha}       </td>

                         <td> <button type="button" data-toggle="modal" href='#modal-id' class="btn btn-xs btn-info"><i class="fa fa-search"></i> &nbsp;&nbsp;Listar&nbsp;</button>                            
                              <div class="modal fade" id="modal-id"> 
                               <div class="modal-dialog">                                
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle-o"></i></button>
                                      <h4 class="modal-title">Detalles</h4>
                                    </div>
                                           <div class="modal-body">
                                              <p class="text-info">Precios Normal: &nbsp;{precio_normal}  &nbsp;&nbsp;Precios Preferencial: &nbsp;{precio_pref}  &nbsp;&nbsp;Precios  Vip: &nbsp;{precio_vip}   </p>                                    
                                           </div>
                                           <div class="modal-body">
                                             <p class="text-info"> Descuento &nbsp;{descuento} </p>
                                           </div>
                                           <div class="modal-body">
                                            <p class="text-info"> Descripcion &nbsp;{descripcion} </p>
                                           </div>
                                                                                      <div class="modal-body">
                                            <p class="text-info"> Iva &nbsp;{iva}% </p>
                                           </div>
                                           
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                   
                                    </div>
                                  </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->
                         </td>

                                 <td>
                                  <div class="btn-group">
                                   <!--    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a> -->
                                      <a class="btn btn-success" href="<?= base_url();?>index.php/Producto/producto/edit/{id_producto}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?= base_url();?>index.php/Producto/producto/delete/{id_producto}"><i class="icon_close_alt2"></i></a>
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




