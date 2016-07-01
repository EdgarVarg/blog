<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi Perfil</title>
</head>
<body>  
    

     <div class="container perfil" align="center">
     <?php echo $this->session->flashdata('fail'); ?>
     <?php echo $this->session->flashdata('good'); ?> 
          <?php echo $this->session->flashdata('correobad'); ?> 
 <h1 style="background:#4ffc57;color:#fff; border-radius: 5px 5px 5px 5px;">Hola <?php  if ($this->session->userdata('logged_in')){ echo $username; }
      
     ?></h1>
     <p class="mensaje">en esta seccion podras modificar tus datos de usuario</p>
     <button id="micapa2" class="btn btn-primary" style="background:#000;color:#fff; border-radius: 5px 5px 5px 5px;width:100%;">Modificar Correo Electronico≡</button>
<script>

$( "#micapa2" ).click(function() {
  $( "#sheet" ).fadeToggle( "slow", 'linear');
  
$('html,body').animate({ scrollTop: 500 }, 'slow');
});
$(window).load(function(){ setTimeout(function(){ $('.mensaje').fadeOut() }, 5000); }); 
</script>
<div id="sheet" class="dive">
     <br>
        <?= form_open_multipart('blog/cambiar_datos') ?>
     <h1>Correo electronico:</h1>
      <input type="text" class="form-control input-lg"  name="email" value="<?php  if ($this->session->userdata('logged_in')){ echo $email; }?>">
	 <br>
	<!-- <h1>Foto de perfil:</h1>
	 <?php echo $foto; ?>
     <img src="<?=base_url()?>application/uploads/<?=$foto?>" />
     <br>
  	 <h1>Seleccionar foto de perfil:
  	     <label class="btn btn-default btn-file">
        Browse <input type="file" style="display: none;" name="foto">
    </label>
	 <br>
	 
	 <br>
	 <h1>Contraseña</h1>
	 <br>
	 <input type="password" name="pass" class="form-control input-lg" >
	 <br>
	 <br>
	  <h1>Confirmar Contraseña</h1>
	 <br>
	 <input type="password" name="pass_confirm" class="form-control input-lg"  >
	 <br>
	 <br>
	  <a href="user_porfile_pass">Cambiar pass</a>
	 -->
	<input type="hidden" name="username" value="<?php  if ($this->session->userdata('logged_in')){ echo $username; }?>">
	 <input type="hidden" name="id_user" value="<?php  if ($this->session->userdata('logged_in')){ echo $id_user; }?>">
	 <br>
	 <br>
	 <input type="submit" value="Modificar correo" class="btn btn-primary">
	
   <?= form_close() ?>
</div>
</div>
</body>
</html>