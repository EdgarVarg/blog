 <head>
 <title>Nueva entrada</title>

 </head>
 <body>
 <title>Entradas</title>
 <div class="col-md-10">
 <?= form_open('blog/recibirdatos')?>
<?php

   $titulo = array(
     'name' => 'titulo',
      'required'=>'true'
   	);
    $contenido = array(
     'name' => 'contenido',
     'type' => 'textarea',
     'required'=>'true'
     
   	);
   	 $autor = array(
     'name' => 'autor',
     'type' => 'textarea'
     
   	);
       $email_autor = array(
     'name' => 'email_autor',
     'type' => 'textarea'
     
    );
?>

 	<div id="titulo">
 	<h1>Titulo:<?= form_input($titulo) ?></h1>
 	</div>
 	<div id="contenido">
 	<h1>Contenido:<br>

 	<?= form_textarea($contenido)?>
 	</h1>
 	</div>
 	<div id="autor">
 	<h1>Autor:

  <input type="text" name="autor" value="<?php echo $username;?>"></h1>
  <input type="text" name="email" value="<?php  echo $email; ?>">
    <input type="text" name="id_autor" value="<?php  echo $id_user; ?>">
 	</div>
 	  <input class="btn-lg" type="submit" value="Publicar"  ></input>
 </div>
 
 <?= form_close()?>

  </body>
  </html>