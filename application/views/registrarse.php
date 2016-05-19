  <head>
 <title>Nueva entrada</title>

 </head>
 <body>
 <title>Entradas</title>
<div class="col-md-4">
     <div class="formula">
 <?= form_open('Blog/recibirusuario')?>

 	<h1>Nombre de usuario:<br>
    <input type="text" name="username"></input>
 	</h1>
  
 	<h1>Contraseña:<br>
 	<input type="password" name="pass"></input>
 	</h1>
 	<input class="btn-lg" type="submit" value="Registrarse" ></input>
 	</div>
 	  
 </div>
 
 <?= form_close()?>

  </body>
  </html>