<script language="JavaScript">
function valEmail(valor){    // Cortesía de http://www.ejemplode.com
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}

</script>

<div class="col-md-4 col-md-offset-4">
     <div class="formula">

      <?php echo $this->session->flashdata('vacio'); ?>
      <?php echo $this->session->flashdata('correobad'); ?>
 	  <?= form_open('Blog/recibirusuario')?>

 	<label>Nombre de usuario:<br> </label>
    <input type="text" name="username" ></input>
 	 <br> <br>
 	
 	<label>Correo Electronico:<br></label>
 	<input type="email" name="email" ></input>
 	 <br> <br>
  
 	<label>Contraseña:<br></label>
 	<input type="password" name="pass" ></input>
 	 <br> <br>
 	<label>Confirmar contraseña:<br></label>
 	<input type="password" name="pass_confirm"  ></input>
 	 <br> <br>
 
 
 	<input class="btn-lg" type="submit" value="Registrarse" style="padding:3%;"></input>
 	</div>
 	  
 </div>
 
 <?= form_close()?>
