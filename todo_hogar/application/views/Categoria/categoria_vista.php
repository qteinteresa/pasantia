
<!-- ////////////////////////////////////////////////////////////////////////////////////////////            -->
<div id="refreshData">
             <div class="row" id="target" >
                  <div class="col-lg-12">                     
                         <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <tbody>
                              <tr class="active">
                                 
                                 <th><i class="fa fa-sort-amount-desc"></i> Descripcion</th>
                                
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>                
                                {formulario}
                              <tr class="" id="userRecordTabel" >                                                                 
                                 <td class="">
                                 {categoria}
                                 </td>                                                      
                              <td>
                                  <div class="btn-group">
<!--                                       <a class="btn btn-primary" href="<?php echo base_url();?>index.php/Categoria/categoria/add"><i class="icon_plus_alt2"></i></a>
 -->                                      <a class="btn btn-success" href="<?php echo base_url();?>index.php/Categoria/categoria/edit/{id_categoria}"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?php echo base_url();?>index.php/Categoria/categoria/delete/{id_categoria}"><i class="icon_close_alt2"></i></a>
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

  
