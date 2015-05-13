 <!-- Navigation -->

      <header class="header dark-bg" >
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Alternar Navegación" data-placement="bottom">
                    <i class="fa fa-windows fa-1x"></i>
                </div>
            </div>

            <!--logo start-->
          
            <a  class="logo" href= "<?php echo base_url();?>index.php/Home/home">TODO <span class="lite">HOGAR</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>    
                    <!-- buscador -->
                     <!--    <form class="navbar-form">
                            <input class="form-control" placeholder="Buscar ?" type="text">
                        </form> -->
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">             
                     <!-- user login dropdown start-->        

                    <li class="dropdown">
  
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                             <span class="profile-ava">
                                <i class="fa fa-user fa-fw"></i>
                            </span>
                            <span class="username">{usuario}</span>
                          
                            
                            <b class="caret"></b>
                           
                             <span class="username">Partida:  &nbsp;{horaAcceso}</span> 
                            
                        </a>
                 
                        <ul class="dropdown-menu extended logout">
                           
                            <li class="eborder-top">
                                <a href="<?php echo base_url();?>index.php/Login/login/logout"><i  class="icon_key_alt">></i> Cerrar Sesi&oacute;n</a>

                            </li>
                             <li>
                                <i class="icon_key_alt"></i> 
                            </li>

                        </ul>
                    </li>

                </ul>
               
            </div>
      </header>    

      <!-- ASIDE   -->
        <aside >
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">

                      <!-- caja  -->
                  <li class="" >
                      <a href="<?php echo base_url();?>index.php/Caja/caja" class="icon-reorder tooltips"  data-placement="bottom" >
                         <i class="fa fa-dropbox"></i>
                          <span>Caja</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                         <i class="fa fa-cart-arrow-down"></i>
                          <span>Ventas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url();?>index.php/factura/factura">Facturacion</a></li>                          
                          <li><a class="" href="javascript:;">Generar Recivos</a></li>
                      </ul>
                  </li> 

                      <!-- Productos abm              -->
                  <li class="" >
                      <a href="<?php echo base_url();?>index.php/Producto/producto" class="icon-reorder tooltips"  data-placement="bottom" >
                         <i class="fa fa-codepen"></i>
                          <span>Productos</span>
                      </a>
                  </li>
                     <!-- Clientes abm -->
                    <li class="" >
                          <a href="<?php echo base_url();?>index.php/cliente/cliente" class="icon-reorder tooltips" data-placement="bottom">
                              <i class="glyphicon glyphicon-user"></i>
                              <span>Clientes</span>
                          </a>
                    </li>   
                       <!-- Empleado rrhh         -->
                    <li class="" >
                          <a href="<?php echo base_url();?>index.php/empleado/empleado" class="icon-reorder tooltips"  data-placement="bottom">
                              <i class="fa fa-users"></i>
                              <span>Recurso Humano</span>
                          </a>
                     </li>   
                      <li class="" >
                          <a href="<?php echo base_url();?>index.php/proveedor/proveedor" class="icon-reorder tooltips"  data-placement="bottom">
                             
                              <i class="fa fa-user-secret"></i>
                              <span>Proveedores</span>
                          </a>
                       </li>    
                          <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-building"></i>
                          <span>Reportes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="">Reportes Ventas</a></li>
                          <li><a class="" href="">Reportes Cheques Emitidos</a></li>
                          <li><a class="" href="">Reportes Cuenta Corriente</a></li>
                      </ul>
                  </li>
   
<!--                   <li>
                      <a class="" href="<?php  base_url();?>index.php/Pais/pais">
                          <i class="icon_genius"></i>
                          <span>Pais</span>
                      </a>
                  </li> -->


                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                         <i class="fa fa-cogs"></i>
                          <span>Mantenimientos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo base_url();?>index.php/Categoria/categoria">Categoria</a></li>
                      </ul>
                  </li>
                  

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      