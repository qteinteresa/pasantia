

<!-- el head cargo desde el controlador  ya que tengo el estilo el en index solo llamo a el head -->
  <body class="login-img3-body">

    <div class="container">

      <form method="post" class="login-form" action="<?= base_url();?>index.php/Login/login/logeo">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" maxlength="20"  id="usuario" name="usuario" onfocus="autofocus" autocomplete="off" placeholder="Usuario" autofocus pattern="[A-Za-z ]{3,100}"  value="<?php echo set_value('usuario');?>" required>
                  
            </div>
            <div class="text-center"><span class="text-danger"><?php echo form_error('usuario'); ?></span></div> 
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" maxlength="30" id="pass" name="pass" placeholder="Password"  autocomplete="off"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" value="<?php echo set_value('pass');?>"  required>
                    
            </div>
            <div class="text-center"><div class="text-danger"><?php echo form_error('pass'); ?></div></div> 
            <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar Sesi&oacute;n</button>
            <button class="btn btn-info btn-lg btn-block" type="button" onclick="closer()">Cancelar </button> 
        </div>

      </form>

    </div>
