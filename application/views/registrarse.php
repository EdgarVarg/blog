<div class="col-md-4">
     <div class="formula">
 <?= form_open('Blog/recibirusuario')?>

 	<h1>Nombre de usuario:<br>
    <input type="text" name="username" required="true"></input>
 	</h1>
  
 	<h1>Contraseña:<br>
 	<input type="password" name="pass" required="true"></input>
 	</h1>
 
 	<h1>Correo Electronico:<br>
 	<input type="mail" name="email" required="true"></input>
 	</h1>
 	<input class="btn-lg" type="submit" value="Registrarse" ></input>
 	</div>
 	  
 </div>
 
 <?= form_close()?>
