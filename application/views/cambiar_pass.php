<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi Perfil</title>
</head>
<body>  
   

      <div class="container perfil" align="center">
         <?php echo $this->session->flashdata('passre'); ?>
	<!-- <h1>Foto de perfil:</h1>
	 <?php echo $foto; ?>
     <img src="<?=base_url()?>application/uploads/<?=$foto?>" />
     <br>
  	 <h1>Seleccionar foto de perfil:
  	     <label class="btn btn-default btn-file">
        Browse <input type="file" style="display: none;" name="foto">
    </label>
	 <br>
	  -->
	 <br>

     <?php echo $this->session->flashdata('failp'); ?>
     <?php echo $this->session->flashdata('goodp'); ?>  
 <button id="micapa" class="btn btn-primary" style="background:#000;color:#fff; border-radius: 5px 5px 5px 5px;width:100%;">Modificar Contraseña≡</button>
<br>
<div style="display:none;">
<script>

$( "button:last" ).click(function() {
  $( "div:last" ).fadeToggle( "slow", 'linear');

$('html,body').animate({ scrollTop: 1000 }, 'slow');
} 
);




</script>
   <?= form_open('blog/cambiar_pass') ?>

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
	
	 <input type="hidden" name="id_user" value="<?php  if ($this->session->userdata('logged_in')){ echo $id_user; }?>">
	 <br>
	 <br>
	 <input type="submit" value="Modificar contraseña" class="btn btn-primary">
         <?= form_close() ?>
	</div>
	</div>


</body>
</html>