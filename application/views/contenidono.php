
 <title>Entradas</title>
 <div class="col-md-10">
    <?php
        foreach ($entradas->result() as $entrada) { ?>
        	
        
 	<div id="titulo">
 	<h1><a href="<?= base_url('index.php/blog/entradasno/'.$entrada->id)?>"><?= $entrada->titulo;?></a></h1>
 	</div>

 	<div id="contenido">
 	<p><?= $entrada->contenido;?></p>
 	</div>
 	<div id="fecha">
 	<h1><?= $entrada->fecha;?></h1>
 	</div>
   <hr>
  <div id="autor">
  <h5>By:<?= $entrada->autor;?></h5>
  </div>
  
   <?php }
     
   
  ?>


