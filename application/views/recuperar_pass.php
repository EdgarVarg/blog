<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi Perfil</title>
</head>
<body>  
    

     <div class="container perfil" align="center">
     <?php 
     $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
$numerodeletras=10; //numero de letras para generar el texto
$cadena = ""; //variable para almacenar la cadena generada
for($i=0;$i<$numerodeletras;$i++)
{
    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
entre el rango 0 a Numero de letras que tiene la cadena */
}
 ?>
     <?php echo $this->session->flashdata('fail'); ?>
     <?php echo $this->session->flashdata('good'); ?> 
     <?php echo $this->session->flashdata('correobad'); ?> 
      
     <p class="mensaje">Para recuperar su contraseña olvidada ingrese los datos solicitados</p>
     <button id="micapa2" class="btn btn-primary" style="background:#000;color:#fff; border-radius: 5px 5px 5px 5px;width:100%;">Recuperar Contraseña≡</button>
<script>

$( "#micapa2" ).click(function() {
  $( "#sheet" ).fadeToggle( "slow", 'linear');
  
$('html,body').animate({ scrollTop: 800 }, 'slow');
});
$(window).load(function(){ setTimeout(function(){ $('.mensaje').fadeOut() }, 5000); }); 
</script>
<div id="sheet" class="dive">
     <br>
        <?= form_open_multipart('blog/recuperar_pass') ?>
     <h1>Correo electronico:</h1>
     <input type="text" class="form-control input-lg"  name="email">
	 <br>
	 <br>
	 <input type="hidden" name="pass" class="form-control input-lg" value="<?php echo $cadena;?>" >


	 <input type="submit" value="Modificar correo" class="btn btn-primary">
	

</div>
</div>
</body>
</html>