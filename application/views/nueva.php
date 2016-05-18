

 <head>
 <title>Nueva entrada</title>

 </head>
 <body>
 <title>Entradas</title>
 <div class="col-md-10">
 <?= form_open('blog/recibirdatos')?>
<?php

   $titulo = array(
     'name' => 'titulo'
   	);
    $contenido = array(
     'name' => 'contenido',
     'type' => 'textarea'
     
   	);
   	 $autor = array(
     'name' => 'autor',
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
 	<input type="text" name="autor" value="<?php echo $username; ?>"></input></h1>
 	</div>
 	  <input class="btn-lg"type="submit" value="Publicar" ></input>
 </div>
 
 <?= form_close()?>

  </body>
  </html>